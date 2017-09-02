<?php

namespace BBBL\LeagueManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 */
class Team
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $idroster;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $url;

    /**
     * @var integer
     */
    private $idteamserver;

    /**
     * @var integer
     */
    private $prestige;

    /**
     * @var integer
     */
    private $apo;

    /**
     * @var integer
     */
    private $assistant;

    /**
     * @var integer
     */
    private $pompom;

    /**
     * @var integer
     */
    private $tresor;

    /**
     * @var integer
     */
    private $reroll;

    /**
     * @var integer
     */
    private $popularite;

    /**
     * @var string
     */
    private $urlPhoto;

    /**
     * @var string
     */
    private $proprio;

    /**
     * @var string
     */
    private $domicile;

    /**
     * @var string
     */
    private $couleurs;

    /**
     * @var string
     */
    private $sponsors;

    /**
     * @var integer
     */
    private $gloire;

    /**
     * @var \DateTime
     */
    private $dateModifGloire;

    /**
     * @var string
     */
    private $background;

    /**
     * @var string
     */
    private $cri;

    /**
     * @var integer
     */
    private $actif;

    /**
     * @var integer
     */
    private $idteam;

    /**
     * @var \BBBL\LeagueManagerBundle\Entity\Membre
     */
    private $idcoach;


    /**
     * Set name
     *
     * @param string $name
     * @return Team
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
     * Set idroster
     *
     * @param integer $idroster
     * @return Team
     */
    public function setIdroster($idroster)
    {
        $this->idroster = $idroster;

        return $this;
    }

    /**
     * Get idroster
     *
     * @return integer 
     */
    public function getIdroster()
    {
        return $this->idroster;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Team
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Team
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set idteamserver
     *
     * @param integer $idteamserver
     * @return Team
     */
    public function setIdteamserver($idteamserver)
    {
        $this->idteamserver = $idteamserver;

        return $this;
    }

    /**
     * Get idteamserver
     *
     * @return integer 
     */
    public function getIdteamserver()
    {
        return $this->idteamserver;
    }

    /**
     * Set prestige
     *
     * @param integer $prestige
     * @return Team
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
     * Set apo
     *
     * @param integer $apo
     * @return Team
     */
    public function setApo($apo)
    {
        $this->apo = $apo;

        return $this;
    }

    /**
     * Get apo
     *
     * @return integer 
     */
    public function getApo()
    {
        return $this->apo;
    }

    /**
     * Set assistant
     *
     * @param integer $assistant
     * @return Team
     */
    public function setAssistant($assistant)
    {
        $this->assistant = $assistant;

        return $this;
    }

    /**
     * Get assistant
     *
     * @return integer 
     */
    public function getAssistant()
    {
        return $this->assistant;
    }

    /**
     * Set pompom
     *
     * @param integer $pompom
     * @return Team
     */
    public function setPompom($pompom)
    {
        $this->pompom = $pompom;

        return $this;
    }

    /**
     * Get pompom
     *
     * @return integer 
     */
    public function getPompom()
    {
        return $this->pompom;
    }

    /**
     * Set tresor
     *
     * @param integer $tresor
     * @return Team
     */
    public function setTresor($tresor)
    {
        $this->tresor = $tresor;

        return $this;
    }

    /**
     * Get tresor
     *
     * @return integer 
     */
    public function getTresor()
    {
        return $this->tresor;
    }

    /**
     * Set reroll
     *
     * @param integer $reroll
     * @return Team
     */
    public function setReroll($reroll)
    {
        $this->reroll = $reroll;

        return $this;
    }

    /**
     * Get reroll
     *
     * @return integer 
     */
    public function getReroll()
    {
        return $this->reroll;
    }

    /**
     * Set popularite
     *
     * @param integer $popularite
     * @return Team
     */
    public function setPopularite($popularite)
    {
        $this->popularite = $popularite;

        return $this;
    }

    /**
     * Get popularite
     *
     * @return integer 
     */
    public function getPopularite()
    {
        return $this->popularite;
    }

    /**
     * Set urlPhoto
     *
     * @param string $urlPhoto
     * @return Team
     */
    public function setUrlPhoto($urlPhoto)
    {
        $this->urlPhoto = $urlPhoto;

        return $this;
    }

    /**
     * Get urlPhoto
     *
     * @return string 
     */
    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    }

    /**
     * Set proprio
     *
     * @param string $proprio
     * @return Team
     */
    public function setProprio($proprio)
    {
        $this->proprio = $proprio;

        return $this;
    }

    /**
     * Get proprio
     *
     * @return string 
     */
    public function getProprio()
    {
        return $this->proprio;
    }

    /**
     * Set domicile
     *
     * @param string $domicile
     * @return Team
     */
    public function setDomicile($domicile)
    {
        $this->domicile = $domicile;

        return $this;
    }

    /**
     * Get domicile
     *
     * @return string 
     */
    public function getDomicile()
    {
        return $this->domicile;
    }

    /**
     * Set couleurs
     *
     * @param string $couleurs
     * @return Team
     */
    public function setCouleurs($couleurs)
    {
        $this->couleurs = $couleurs;

        return $this;
    }

    /**
     * Get couleurs
     *
     * @return string 
     */
    public function getCouleurs()
    {
        return $this->couleurs;
    }

    /**
     * Set sponsors
     *
     * @param string $sponsors
     * @return Team
     */
    public function setSponsors($sponsors)
    {
        $this->sponsors = $sponsors;

        return $this;
    }

    /**
     * Get sponsors
     *
     * @return string 
     */
    public function getSponsors()
    {
        return $this->sponsors;
    }

    /**
     * Set gloire
     *
     * @param integer $gloire
     * @return Team
     */
    public function setGloire($gloire)
    {
        $this->gloire = $gloire;

        return $this;
    }

    /**
     * Get gloire
     *
     * @return integer 
     */
    public function getGloire()
    {
        return $this->gloire;
    }

    /**
     * Set dateModifGloire
     *
     * @param \DateTime $dateModifGloire
     * @return Team
     */
    public function setDateModifGloire($dateModifGloire)
    {
        $this->dateModifGloire = $dateModifGloire;

        return $this;
    }

    /**
     * Get dateModifGloire
     *
     * @return \DateTime 
     */
    public function getDateModifGloire()
    {
        return $this->dateModifGloire;
    }

    /**
     * Set background
     *
     * @param string $background
     * @return Team
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return string 
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set cri
     *
     * @param string $cri
     * @return Team
     */
    public function setCri($cri)
    {
        $this->cri = $cri;

        return $this;
    }

    /**
     * Get cri
     *
     * @return string 
     */
    public function getCri()
    {
        return $this->cri;
    }

    /**
     * Set actif
     *
     * @param integer $actif
     * @return Team
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
     * Get idteam
     *
     * @return integer 
     */
    public function getIdteam()
    {
        return $this->idteam;
    }

    /**
     * Set idcoach
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Membre $idcoach
     * @return Team
     */
    public function setIdcoach(\BBBL\LeagueManagerBundle\Entity\Membre $idcoach = null)
    {
        $this->idcoach = $idcoach;

        return $this;
    }

    /**
     * Get idcoach
     *
     * @return \BBBL\LeagueManagerBundle\Entity\Membre 
     */
    public function getIdcoach()
    {
        return $this->idcoach;
    }
}
