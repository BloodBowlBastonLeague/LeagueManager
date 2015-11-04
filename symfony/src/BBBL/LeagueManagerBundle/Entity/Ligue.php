<?php

namespace BBBL\LeagueManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ligue
 */
class Ligue
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $ordre;

    /**
     * @var integer
     */
    private $prestige;

    /**
     * @var integer
     */
    private $actif;

    /**
     * @var integer
     */
    private $posTop;

    /**
     * @var integer
     */
    private $posLeft;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $idligue;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idliguechild;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idliguechild = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Ligue
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
     * Set ordre
     *
     * @param float $ordre
     * @return Ligue
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return float 
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set prestige
     *
     * @param integer $prestige
     * @return Ligue
     */
    public function setPrestige($prestige)
    {
        $this->prestige = $prestige;

        return $this;
    }

    /**
     * Get prestige
     *
     * @return integer 
     */
    public function getPrestige()
    {
        return $this->prestige;
    }

    /**
     * Set actif
     *
     * @param integer $actif
     * @return Ligue
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return integer 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set posTop
     *
     * @param integer $posTop
     * @return Ligue
     */
    public function setPosTop($posTop)
    {
        $this->posTop = $posTop;

        return $this;
    }

    /**
     * Get posTop
     *
     * @return integer 
     */
    public function getPosTop()
    {
        return $this->posTop;
    }

    /**
     * Set posLeft
     *
     * @param integer $posLeft
     * @return Ligue
     */
    public function setPosLeft($posLeft)
    {
        $this->posLeft = $posLeft;

        return $this;
    }

    /**
     * Get posLeft
     *
     * @return integer 
     */
    public function getPosLeft()
    {
        return $this->posLeft;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Ligue
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get idligue
     *
     * @return integer 
     */
    public function getIdligue()
    {
        return $this->idligue;
    }

    /**
     * Add idliguechild
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Ligue $idliguechild
     * @return Ligue
     */
    public function addIdliguechild(\BBBL\LeagueManagerBundle\Entity\Ligue $idliguechild)
    {
        $this->idliguechild[] = $idliguechild;

        return $this;
    }

    /**
     * Remove idliguechild
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Ligue $idliguechild
     */
    public function removeIdliguechild(\BBBL\LeagueManagerBundle\Entity\Ligue $idliguechild)
    {
        $this->idliguechild->removeElement($idliguechild);
    }

    /**
     * Get idliguechild
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdliguechild()
    {
        return $this->idliguechild;
    }
}
