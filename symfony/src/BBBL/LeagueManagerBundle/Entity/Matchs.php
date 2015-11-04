<?php

namespace BBBL\LeagueManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matchs
 */
class Matchs
{
    /**
     * @var string
     */
    private $urltopic;

    /**
     * @var integer
     */
    private $journee;

    /**
     * @var \DateTime
     */
    private $datematch;

    /**
     * @var integer
     */
    private $score1;

    /**
     * @var integer
     */
    private $score2;

    /**
     * @var integer
     */
    private $possession1;

    /**
     * @var integer
     */
    private $occupationOwn1;

    /**
     * @var integer
     */
    private $occupationTheir1;

    /**
     * @var integer
     */
    private $subSonne1;

    /**
     * @var integer
     */
    private $subKo1;

    /**
     * @var integer
     */
    private $subBlesse1;

    /**
     * @var integer
     */
    private $subMort1;

    /**
     * @var integer
     */
    private $possession2;

    /**
     * @var integer
     */
    private $occupationOwn2;

    /**
     * @var integer
     */
    private $occupationTheir2;

    /**
     * @var integer
     */
    private $subSonne2;

    /**
     * @var integer
     */
    private $subKo2;

    /**
     * @var integer
     */
    private $subBlesse2;

    /**
     * @var integer
     */
    private $subMort2;

    /**
     * @var integer
     */
    private $note;

    /**
     * @var integer
     */
    private $spectateur;

    /**
     * @var string
     */
    private $poule;

    /**
     * @var integer
     */
    private $modifGloire1;

    /**
     * @var integer
     */
    private $modifGloire2;

    /**
     * @var boolean
     */
    private $malusGloire;

    /**
     * @var integer
     */
    private $idmatch;

    /**
     * @var \BBBL\LeagueManagerBundle\Entity\Matchs
     */
    private $idmatch2;

    /**
     * @var \BBBL\LeagueManagerBundle\Entity\Matchs
     */
    private $idmatch1;

    /**
     * @var \BBBL\LeagueManagerBundle\Entity\Team
     */
    private $idteam2;

    /**
     * @var \BBBL\LeagueManagerBundle\Entity\SaisonLigue
     */
    private $idsaisonLigue;

    /**
     * @var \BBBL\LeagueManagerBundle\Entity\Team
     */
    private $idteam1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idplayer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idplayer = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set urltopic
     *
     * @param string $urltopic
     * @return Matchs
     */
    public function setUrltopic($urltopic)
    {
        $this->urltopic = $urltopic;

        return $this;
    }

    /**
     * Get urltopic
     *
     * @return string 
     */
    public function getUrltopic()
    {
        return $this->urltopic;
    }

    /**
     * Set journee
     *
     * @param integer $journee
     * @return Matchs
     */
    public function setJournee($journee)
    {
        $this->journee = $journee;

        return $this;
    }

    /**
     * Get journee
     *
     * @return integer 
     */
    public function getJournee()
    {
        return $this->journee;
    }

    /**
     * Set datematch
     *
     * @param \DateTime $datematch
     * @return Matchs
     */
    public function setDatematch($datematch)
    {
        $this->datematch = $datematch;

        return $this;
    }

    /**
     * Get datematch
     *
     * @return \DateTime 
     */
    public function getDatematch()
    {
        return $this->datematch;
    }

    /**
     * Set score1
     *
     * @param integer $score1
     * @return Matchs
     */
    public function setScore1($score1)
    {
        $this->score1 = $score1;

        return $this;
    }

    /**
     * Get score1
     *
     * @return integer 
     */
    public function getScore1()
    {
        return $this->score1;
    }

    /**
     * Set score2
     *
     * @param integer $score2
     * @return Matchs
     */
    public function setScore2($score2)
    {
        $this->score2 = $score2;

        return $this;
    }

    /**
     * Get score2
     *
     * @return integer 
     */
    public function getScore2()
    {
        return $this->score2;
    }

    /**
     * Set possession1
     *
     * @param integer $possession1
     * @return Matchs
     */
    public function setPossession1($possession1)
    {
        $this->possession1 = $possession1;

        return $this;
    }

    /**
     * Get possession1
     *
     * @return integer 
     */
    public function getPossession1()
    {
        return $this->possession1;
    }

    /**
     * Set occupationOwn1
     *
     * @param integer $occupationOwn1
     * @return Matchs
     */
    public function setOccupationOwn1($occupationOwn1)
    {
        $this->occupationOwn1 = $occupationOwn1;

        return $this;
    }

    /**
     * Get occupationOwn1
     *
     * @return integer 
     */
    public function getOccupationOwn1()
    {
        return $this->occupationOwn1;
    }

    /**
     * Set occupationTheir1
     *
     * @param integer $occupationTheir1
     * @return Matchs
     */
    public function setOccupationTheir1($occupationTheir1)
    {
        $this->occupationTheir1 = $occupationTheir1;

        return $this;
    }

    /**
     * Get occupationTheir1
     *
     * @return integer 
     */
    public function getOccupationTheir1()
    {
        return $this->occupationTheir1;
    }

    /**
     * Set subSonne1
     *
     * @param integer $subSonne1
     * @return Matchs
     */
    public function setSubSonne1($subSonne1)
    {
        $this->subSonne1 = $subSonne1;

        return $this;
    }

    /**
     * Get subSonne1
     *
     * @return integer 
     */
    public function getSubSonne1()
    {
        return $this->subSonne1;
    }

    /**
     * Set subKo1
     *
     * @param integer $subKo1
     * @return Matchs
     */
    public function setSubKo1($subKo1)
    {
        $this->subKo1 = $subKo1;

        return $this;
    }

    /**
     * Get subKo1
     *
     * @return integer 
     */
    public function getSubKo1()
    {
        return $this->subKo1;
    }

    /**
     * Set subBlesse1
     *
     * @param integer $subBlesse1
     * @return Matchs
     */
    public function setSubBlesse1($subBlesse1)
    {
        $this->subBlesse1 = $subBlesse1;

        return $this;
    }

    /**
     * Get subBlesse1
     *
     * @return integer 
     */
    public function getSubBlesse1()
    {
        return $this->subBlesse1;
    }

    /**
     * Set subMort1
     *
     * @param integer $subMort1
     * @return Matchs
     */
    public function setSubMort1($subMort1)
    {
        $this->subMort1 = $subMort1;

        return $this;
    }

    /**
     * Get subMort1
     *
     * @return integer 
     */
    public function getSubMort1()
    {
        return $this->subMort1;
    }

    /**
     * Set possession2
     *
     * @param integer $possession2
     * @return Matchs
     */
    public function setPossession2($possession2)
    {
        $this->possession2 = $possession2;

        return $this;
    }

    /**
     * Get possession2
     *
     * @return integer 
     */
    public function getPossession2()
    {
        return $this->possession2;
    }

    /**
     * Set occupationOwn2
     *
     * @param integer $occupationOwn2
     * @return Matchs
     */
    public function setOccupationOwn2($occupationOwn2)
    {
        $this->occupationOwn2 = $occupationOwn2;

        return $this;
    }

    /**
     * Get occupationOwn2
     *
     * @return integer 
     */
    public function getOccupationOwn2()
    {
        return $this->occupationOwn2;
    }

    /**
     * Set occupationTheir2
     *
     * @param integer $occupationTheir2
     * @return Matchs
     */
    public function setOccupationTheir2($occupationTheir2)
    {
        $this->occupationTheir2 = $occupationTheir2;

        return $this;
    }

    /**
     * Get occupationTheir2
     *
     * @return integer 
     */
    public function getOccupationTheir2()
    {
        return $this->occupationTheir2;
    }

    /**
     * Set subSonne2
     *
     * @param integer $subSonne2
     * @return Matchs
     */
    public function setSubSonne2($subSonne2)
    {
        $this->subSonne2 = $subSonne2;

        return $this;
    }

    /**
     * Get subSonne2
     *
     * @return integer 
     */
    public function getSubSonne2()
    {
        return $this->subSonne2;
    }

    /**
     * Set subKo2
     *
     * @param integer $subKo2
     * @return Matchs
     */
    public function setSubKo2($subKo2)
    {
        $this->subKo2 = $subKo2;

        return $this;
    }

    /**
     * Get subKo2
     *
     * @return integer 
     */
    public function getSubKo2()
    {
        return $this->subKo2;
    }

    /**
     * Set subBlesse2
     *
     * @param integer $subBlesse2
     * @return Matchs
     */
    public function setSubBlesse2($subBlesse2)
    {
        $this->subBlesse2 = $subBlesse2;

        return $this;
    }

    /**
     * Get subBlesse2
     *
     * @return integer 
     */
    public function getSubBlesse2()
    {
        return $this->subBlesse2;
    }

    /**
     * Set subMort2
     *
     * @param integer $subMort2
     * @return Matchs
     */
    public function setSubMort2($subMort2)
    {
        $this->subMort2 = $subMort2;

        return $this;
    }

    /**
     * Get subMort2
     *
     * @return integer 
     */
    public function getSubMort2()
    {
        return $this->subMort2;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Matchs
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set spectateur
     *
     * @param integer $spectateur
     * @return Matchs
     */
    public function setSpectateur($spectateur)
    {
        $this->spectateur = $spectateur;

        return $this;
    }

    /**
     * Get spectateur
     *
     * @return integer 
     */
    public function getSpectateur()
    {
        return $this->spectateur;
    }

    /**
     * Set poule
     *
     * @param string $poule
     * @return Matchs
     */
    public function setPoule($poule)
    {
        $this->poule = $poule;

        return $this;
    }

    /**
     * Get poule
     *
     * @return string 
     */
    public function getPoule()
    {
        return $this->poule;
    }

    /**
     * Set modifGloire1
     *
     * @param integer $modifGloire1
     * @return Matchs
     */
    public function setModifGloire1($modifGloire1)
    {
        $this->modifGloire1 = $modifGloire1;

        return $this;
    }

    /**
     * Get modifGloire1
     *
     * @return integer 
     */
    public function getModifGloire1()
    {
        return $this->modifGloire1;
    }

    /**
     * Set modifGloire2
     *
     * @param integer $modifGloire2
     * @return Matchs
     */
    public function setModifGloire2($modifGloire2)
    {
        $this->modifGloire2 = $modifGloire2;

        return $this;
    }

    /**
     * Get modifGloire2
     *
     * @return integer 
     */
    public function getModifGloire2()
    {
        return $this->modifGloire2;
    }

    /**
     * Set malusGloire
     *
     * @param boolean $malusGloire
     * @return Matchs
     */
    public function setMalusGloire($malusGloire)
    {
        $this->malusGloire = $malusGloire;

        return $this;
    }

    /**
     * Get malusGloire
     *
     * @return boolean 
     */
    public function getMalusGloire()
    {
        return $this->malusGloire;
    }

    /**
     * Get idmatch
     *
     * @return integer 
     */
    public function getIdmatch()
    {
        return $this->idmatch;
    }

    /**
     * Set idmatch2
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Matchs $idmatch2
     * @return Matchs
     */
    public function setIdmatch2(\BBBL\LeagueManagerBundle\Entity\Matchs $idmatch2 = null)
    {
        $this->idmatch2 = $idmatch2;

        return $this;
    }

    /**
     * Get idmatch2
     *
     * @return \BBBL\LeagueManagerBundle\Entity\Matchs 
     */
    public function getIdmatch2()
    {
        return $this->idmatch2;
    }

    /**
     * Set idmatch1
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Matchs $idmatch1
     * @return Matchs
     */
    public function setIdmatch1(\BBBL\LeagueManagerBundle\Entity\Matchs $idmatch1 = null)
    {
        $this->idmatch1 = $idmatch1;

        return $this;
    }

    /**
     * Get idmatch1
     *
     * @return \BBBL\LeagueManagerBundle\Entity\Matchs 
     */
    public function getIdmatch1()
    {
        return $this->idmatch1;
    }

    /**
     * Set idteam2
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Team $idteam2
     * @return Matchs
     */
    public function setIdteam2(\BBBL\LeagueManagerBundle\Entity\Team $idteam2 = null)
    {
        $this->idteam2 = $idteam2;

        return $this;
    }

    /**
     * Get idteam2
     *
     * @return \BBBL\LeagueManagerBundle\Entity\Team 
     */
    public function getIdteam2()
    {
        return $this->idteam2;
    }

    /**
     * Set idsaisonLigue
     *
     * @param \BBBL\LeagueManagerBundle\Entity\SaisonLigue $idsaisonLigue
     * @return Matchs
     */
    public function setIdsaisonLigue(\BBBL\LeagueManagerBundle\Entity\SaisonLigue $idsaisonLigue = null)
    {
        $this->idsaisonLigue = $idsaisonLigue;

        return $this;
    }

    /**
     * Get idsaisonLigue
     *
     * @return \BBBL\LeagueManagerBundle\Entity\SaisonLigue 
     */
    public function getIdsaisonLigue()
    {
        return $this->idsaisonLigue;
    }

    /**
     * Set idteam1
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Team $idteam1
     * @return Matchs
     */
    public function setIdteam1(\BBBL\LeagueManagerBundle\Entity\Team $idteam1 = null)
    {
        $this->idteam1 = $idteam1;

        return $this;
    }

    /**
     * Get idteam1
     *
     * @return \BBBL\LeagueManagerBundle\Entity\Team 
     */
    public function getIdteam1()
    {
        return $this->idteam1;
    }

    /**
     * Add idplayer
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Player $idplayer
     * @return Matchs
     */
    public function addIdplayer(\BBBL\LeagueManagerBundle\Entity\Player $idplayer)
    {
        $this->idplayer[] = $idplayer;

        return $this;
    }

    /**
     * Remove idplayer
     *
     * @param \BBBL\LeagueManagerBundle\Entity\Player $idplayer
     */
    public function removeIdplayer(\BBBL\LeagueManagerBundle\Entity\Player $idplayer)
    {
        $this->idplayer->removeElement($idplayer);
    }

    /**
     * Get idplayer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdplayer()
    {
        return $this->idplayer;
    }
}
