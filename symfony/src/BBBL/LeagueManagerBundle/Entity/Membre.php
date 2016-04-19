<?php

namespace BBBL\LeagueManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 */
class Membre
{
    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var integer
     */
    private $droits;

    /**
     * @var boolean
     */
    private $hoverNav;

    /**
     * @var boolean
     */
    private $hoverNavPlace;

    /**
     * @var integer
     */
    private $tresorerie;

    /**
     * @var string
     */
    private $policeDefaut;

    /**
     * @var boolean
     */
    private $actif;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $idmembre;

    public function __toString() {
        return $this->getPseudo();
    }


    /**
     * Set pseudo
     *
     * @param string $pseudo
     * @return Membre
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Membre
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pass
     *
     * @param string $pass
     * @return Membre
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set droits
     *
     * @param integer $droits
     * @return Membre
     */
    public function setDroits($droits)
    {
        $this->droits = $droits;

        return $this;
    }

    /**
     * Get droits
     *
     * @return integer 
     */
    public function getDroits()
    {
        return $this->droits;
    }

    /**
     * Set hoverNav
     *
     * @param boolean $hoverNav
     * @return Membre
     */
    public function setHoverNav($hoverNav)
    {
        $this->hoverNav = $hoverNav;

        return $this;
    }

    /**
     * Get hoverNav
     *
     * @return boolean 
     */
    public function getHoverNav()
    {
        return $this->hoverNav;
    }

    /**
     * Set hoverNavPlace
     *
     * @param boolean $hoverNavPlace
     * @return Membre
     */
    public function setHoverNavPlace($hoverNavPlace)
    {
        $this->hoverNavPlace = $hoverNavPlace;

        return $this;
    }

    /**
     * Get hoverNavPlace
     *
     * @return boolean 
     */
    public function getHoverNavPlace()
    {
        return $this->hoverNavPlace;
    }

    /**
     * Set tresorerie
     *
     * @param integer $tresorerie
     * @return Membre
     */
    public function setTresorerie($tresorerie)
    {
        $this->tresorerie = $tresorerie;

        return $this;
    }

    /**
     * Get tresorerie
     *
     * @return integer 
     */
    public function getTresorerie()
    {
        return $this->tresorerie;
    }

    /**
     * Set policeDefaut
     *
     * @param string $policeDefaut
     * @return Membre
     */
    public function setPoliceDefaut($policeDefaut)
    {
        $this->policeDefaut = $policeDefaut;

        return $this;
    }

    /**
     * Get policeDefaut
     *
     * @return string 
     */
    public function getPoliceDefaut()
    {
        return $this->policeDefaut;
    }

    /**
     * Set actif
     *
     * @param boolean $actif
     * @return Membre
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
     * Set description
     *
     * @param string $description
     * @return Membre
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
     * Get idmembre
     *
     * @return integer 
     */
    public function getIdmembre()
    {
        return $this->idmembre;
    }
}
