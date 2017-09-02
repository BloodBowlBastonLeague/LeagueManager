<?php

namespace BBBL\LeagueManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SaisonLigue
 */
class SaisonLigue
{
    /**
     * @var string
     */
    private $saison;

    /**
     * @var string
     */
    private $modeLigue;

    /**
     * @var float
     */
    private $ordre;

    /**
     * @var \DateTime
     */
    private $dateDeb;

    /**
     * @var \DateTime
     */
    private $dateFin;

    /**
     * @var boolean
     */
    private $actif;

    /**
     * @var integer
     */
    private $idsaisonLigue;

    /**
     * @var \BBBL\LeagueManagerBundle\Entity\Ligue
     */
    private $idligue;


    /**
     * Set saison
     *
     * @param string $saison
     * @return SaisonLigue
     */
    public function setSaison($saison)
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get saison
     *
     * @return string 
     */
    public function getSaison()
    {
        return $this->saison;
    }

    /**
     * Set modeLigue
     *
     * @param string $modeLigue
     * @return SaisonLigue
     */
    public function setModeLigue($modeLigue)
    {
        $this->modeLigue = $modeLigue;

        return $this;
    }

    /**
     * Get modeLigue
     *
     * @return string 
     */
    public function getModeLigue()
    {
        return $this->modeLigue;
    }

    /**
     * Set ordre
     *
     * @param float $ordre
     * @return SaisonLigue
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
     * Set dateDeb
     *
     * @param \DateTime $dateDeb
     * @return SaisonLigue
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    /**
     * Get dateDeb
     *
     * @return \DateTime 
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return SaisonLigue
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return SaisonLigue
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return boolean 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Get idsaisonLigue
     *
     * @return integer 
     */
    public function getIdsaisonLigue()
    {
        return $this->idsaisonLigue;
    }

    /**
     * Set idligue
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Ligue $idligue
     * @return SaisonLigue
     */
    public function setIdligue(\BBBL\LeagueManagerBundle\Entity\Ligue $idligue = null)
    {
        $this->idligue = $idligue;

        return $this;
    }

    /**
     * Get idligue
     *
     * @return \BBBL\LeagueManagerBundle\Entity\Ligue 
     */
    public function getIdligue()
    {
        return $this->idligue;
    }
}
