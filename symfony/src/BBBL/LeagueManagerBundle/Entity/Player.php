<?php

namespace BBBL\LeagueManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 */
class Player
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $idposte;

    /**
     * @var string
     */
    private $competences;

    /**
     * @var string
     */
    private $blessures;

    /**
     * @var boolean
     */
    private $fired;

    /**
     * @var boolean
     */
    private $blesse;

    /**
     * @var integer
     */
    private $num;

    /**
     * @var integer
     */
    private $xp;

    /**
     * @var integer
     */
    private $idplayer;

    /**
     * @var \BBBL\LeagueManagerBundle\Entity\Team
     */
    private $idteam;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idmatch;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idmatch = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Player
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
     * Set idposte
     *
     * @param integer $idposte
     * @return Player
     */
    public function setIdposte($idposte)
    {
        $this->idposte = $idposte;

        return $this;
    }

    /**
     * Get idposte
     *
     * @return integer 
     */
    public function getIdposte()
    {
        return $this->idposte;
    }

    /**
     * Set competences
     *
     * @param string $competences
     * @return Player
     */
    public function setCompetences($competences)
    {
        $this->competences = $competences;

        return $this;
    }

    /**
     * Get competences
     *
     * @return string 
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * Set blessures
     *
     * @param string $blessures
     * @return Player
     */
    public function setBlessures($blessures)
    {
        $this->blessures = $blessures;

        return $this;
    }

    /**
     * Get blessures
     *
     * @return string 
     */
    public function getBlessures()
    {
        return $this->blessures;
    }

    /**
     * Set fired
     *
     * @param boolean $fired
     * @return Player
     */
    public function setFired($fired)
    {
        $this->fired = $fired;

        return $this;
    }

    /**
     * Get fired
     *
     * @return boolean 
     */
    public function getFired()
    {
        return $this->fired;
    }

    /**
     * Set blesse
     *
     * @param boolean $blesse
     * @return Player
     */
    public function setBlesse($blesse)
    {
        $this->blesse = $blesse;

        return $this;
    }

    /**
     * Get blesse
     *
     * @return boolean 
     */
    public function getBlesse()
    {
        return $this->blesse;
    }

    /**
     * Set num
     *
     * @param integer $num
     * @return Player
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * Get num
     *
     * @return integer 
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set xp
     *
     * @param integer $xp
     * @return Player
     */
    public function setXp($xp)
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * Get xp
     *
     * @return integer 
     */
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * Get idplayer
     *
     * @return integer 
     */
    public function getIdplayer()
    {
        return $this->idplayer;
    }

    /**
     * Set idteam
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Team $idteam
     * @return Player
     */
    public function setIdteam(\BBBL\LeagueManagerBundle\Entity\Team $idteam = null)
    {
        $this->idteam = $idteam;

        return $this;
    }

    /**
     * Get idteam
     *
     * @return \BBBL\LeagueManagerBundle\Entity\Team 
     */
    public function getIdteam()
    {
        return $this->idteam;
    }

    /**
     * Add idmatch
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Matchs $idmatch
     * @return Player
     */
    public function addIdmatch(\BBBL\LeagueManagerBundle\Entity\Matchs $idmatch)
    {
        $this->idmatch[] = $idmatch;

        return $this;
    }

    /**
     * Remove idmatch
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Matchs $idmatch
     */
    public function removeIdmatch(\BBBL\LeagueManagerBundle\Entity\Matchs $idmatch)
    {
        $this->idmatch->removeElement($idmatch);
    }

    /**
     * Get idmatch
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdmatch()
    {
        return $this->idmatch;
    }
}
