<?php

namespace Model\entity;

use Exception;

class Film
{
    private $idFilm;
    private $titre;
    private $realisateur;
    private $affiche;
    private $annee;
    private $roles = [];

    public function __construct(?int $idFilm, string $titre, string $realisateur, string $affiche, string $annee, array $roles)

    {
        $this->setIdFilm($idFilm);
        $this->setTitre($titre);
        $this->setRealisateur($realisateur);
        $this->setAffiche($affiche);
        $this->setAnnee($annee);
        $this->setRoles($roles);
    }

    /**
     * Get the value of idFilm
     */
    public function getIdFilm()
    {
        return $this->idFilm;
    }

    /**
     * Set the value of idFilm
     *
     * @return  self
     */
    public function setIdFilm($idFilm)
    {
        $this->idFilm = $idFilm;

        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre($titre)
    {
        if (isset($titre) && !empty($titre)) {

            $this->titre = $titre;
        } else {
            throw new Exception("Le champ n'est pas correct.", 7);
        }

        return $this;
    }

    /**
     * Get the value of realisateur
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set the value of realisateur
     *
     * @return  self
     */
    public function setRealisateur($realisateur)
    {
        if (isset($realisateur) && !empty($realisateur)) {

            $this->realisateur = $realisateur;
        } else {
            throw new Exception("Le champ n'est pas rempli correctement", 6);
        }

        return $this;
    }

    /**
     * Get the value of affiche
     */
    public function getAffiche()
    {
        return $this->affiche;
    }

    /**
     * Set the value of affiche
     *
     * @return  self
     */
    public function setAffiche($affiche)
    {
        $this->affiche = $affiche;

        return $this;
    }

    /**
     * Get the value of annee
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     *
     * @return  self
     */

    public function setAnnee($annee)
    {
        if (isset($annee) && !empty($annee) && is_numeric($annee) && strlen($annee) === 4) {
            return $this->annee = $annee;
        } else {
            throw new Exception("L'année n'est pas dans le bon format.", 4);
        }
    }

    /**
     * Get the value of roles
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     *
     * @return  self
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}
