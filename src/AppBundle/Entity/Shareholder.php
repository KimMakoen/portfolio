<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shareholder
 *
 * @ORM\Table(name="shareholder")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShareholderRepository")
 */
class Shareholder
{
    /**
     * @ORM\OneToMany(targetEntity="Portfolio", mappedBy="shareholder")
     */
    private $portfolio;
    /**
     * @return mixed
     */
    public function getPortfolio()
    {
        return $this->portfolio;
    }

    /**
     * @param Portfolio $portfolio
     */
    public function setPortfolio (Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Shareholder
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

