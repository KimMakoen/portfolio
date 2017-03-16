<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Share
 *
 * @ORM\Table(name="share")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ShareRepository")
 */
class Share
{
    /**
     * @ORM\ManyToOne(targetEntity="Portfolio", inversedBy="shares")
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
    public function setPortfolio(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }

    /**
     * @ORM\OneToMany(targetEntity="Price", mappedBy="share")
     */
    private $prices;

    public function __construct()
    {
        $this->prices = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->prices;
    }

    /**
     * @param Price $price
     */
    public function addPrice (Price $price)
    {
        $this->prices[] = $price;
        $price->setShare($this);
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
     * @ORM\Column(name="listing_name", type="string", length=255, unique=true)
     */
    private $listingName;


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
     * Set listingName
     *
     * @param string $listingName
     *
     * @return Share
     */
    public function setListingName($listingName)
    {
        $this->listingName = $listingName;

        return $this;
    }

    /**
     * Get listingName
     *
     * @return string
     */
    public function getListingName()
    {
        return $this->listingName;
    }

}

