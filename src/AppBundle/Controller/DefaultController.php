<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Price;
use AppBundle\Entity\Share;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function createAction()
    {
        //csv parsing
        $csv = array_map('str_getcsv', file('C:\Users\user\Downloads\table.csv'));
        $prices = [];
        $em = $this->getDoctrine()->getManager();
        $interval = new \DateInterval('P1M');
        /** @var Share $share */
        $share = $this->getDoctrine()
            ->getRepository('AppBundle:Share')
            ->find(1);

        foreach ($csv as $line) {
            if ($line[0] == 'Date'){
                continue;
            }
            $price = new Price();
            $price->setSharesPrice((int)$line[4]);
            $date = new \DateTimeImmutable($line[0]);
            $price->setStartDate($date);
            $price->setEndDate($date->add($interval));
            $em->persist($price);

            $share->addPrice($price);

        }
        // tells Doctrine you want to (eventually) save the Share (no queries yet)
          $em->persist($share);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new share with id '. $share->getId());
    }

    /**
     * @Route("/{share}", name="show")
     */
    public function showAction($share)
    {
        $share = $this->getDoctrine()
            ->getRepository('AppBundle:Share')
            ->find($share);

        if (!$share) {
            throw $this->createNotFoundException(
                'No shares found for id '.$share
            );
        }

        return new Response('Share id is '. $share->getId());
    }
//    public function indexAction(Request $request)
//    {
//        // replace this example code with whatever you need
//        return $this->render('default/index.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
//        ]);
}

