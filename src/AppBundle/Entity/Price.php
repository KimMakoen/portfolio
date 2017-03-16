<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Price
 *
 * @ORM\Table(name="price")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PriceRepository")
 */
class Price
{
    /**
     * @ORM\ManyToOne(targetEntity="Share", inversedBy="price")
     */
    private $share;

    /**
     * @return mixed
     */
    public function getShare()
    {
        return $this->share;
    }

    /**
     * @param Share $share
     */
    public function setShare (Share $share)
    {
        $this->share = $share;
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
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="startDate", type="date")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="date")
     */
    private $endDate;

    /**
     * @var int
     *
     * @ORM\Column(name="sharesPrice", type="integer", nullable=true)
     */
    private $sharesPrice;


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
     * Set startDate
     *
     * @param \DateTimeImmutable $startDate
     *
     * @return Price
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTimeImmutable
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Price
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set sharesPrice
     *
     * @param integer $sharesPrice
     *
     * @return Price
     */
    public function setSharesPrice($sharesPrice)
    {
        $this->sharesPrice = $sharesPrice;

        return $this;
    }

    /**
     * Get sharesPrice
     *
     * @return int
     */
    public function getSharesPrice()
    {
        return $this->sharesPrice;
    }
}

