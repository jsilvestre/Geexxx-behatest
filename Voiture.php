<?php

class Voiture {
    
    /**
     * Détermine la vitesse maximum du véhicule
     */
    const VITESSE_MAX = 130;
    
    /**
     * La vitesse de la voiture
     */
    protected $vitesse;
    
    /**
     * La distance parcourue par la voiture
     */
    protected $compteur;
    
    public function __construct($defaultVitesse)
    {
        $this->vitesse = $defaultVitesse;
        $this->compteur = 0;
    }

    /**
     * Augmente la vitesse de $delta km/h
     * @param int $delta en km/h
     */    
    public function accelere($delta)
    {
        if($this->vitesse + $delta > self::VITESSE_MAX)
        {
            $this->vitesse = self::VITESSE_MAX;
        }
        else
        {
            $this->vitesse += $delta;
        }
    }
    
    /**
     * Fait avancer la voiture pendant un temps donné en heure
     */
    public function avancePendant($temps)
    {
        $this->compteur += $this->vitesse * $temps;
    }
    
    /**
     * Retourne la vitesse actuelle
     * @return int en km/h
     */
    public function getVitesse()
    {
        return $this->vitesse;
    }
    
    /**
     * Retourne la valeur du compteur
     * @return int en km
     */
    public function getCompteur()
    {
        return $this->compteur;
    }
}