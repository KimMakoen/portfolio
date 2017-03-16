<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Portfolio
 *
 * @ORM\Table(name="portfolio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PortfolioRepository")
 */
class Portfolio
{
    public function __construct()
    {
        $this->shares = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="Shareholder", inversedBy="portfolio")
     */
    private $shareholder;

    /**
     * @return mixed
     */
    public function getShareholder()
    {
        return $this->shareholder;
    }

    /**
     * @param Shareholder $shareholder
     */
    public function setShareholder(Shareholder $shareholder)
    {
        $this->shareholder = $shareholder;
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Share", mappedBy="portfolio")
     */
    private $shares;


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
     * @return Portfolio
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

    /**
     * Set shares
     *
     * @param array $shares
     *
     * @return Portfolio
     */
    public function setShares($shares)
    {
        $this->shares = $shares;

        return $this;
    }

    /**
     * Get shares
     *
     * @return array
     */
    public function getShares()
    {
        return $this->shares;
    }
}

