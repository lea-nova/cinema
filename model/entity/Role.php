<?php

namespace Model\entity;

class Role
{
    private $idActeur;
    private $idFilm;
    private $id;
    private $personnage;
    private $acteur;

    public function __construct(int $idActeur, int $idFilm, int $id, string $personnage, Acteur $acteur)
    {
        $this->setIdActeur($idActeur);
        $this->setIdFilm($idFilm);
        $this->setId($id);
        $this->setPersonnage($personnage);
        $this->setActeur($acteur);
    }


    /*
     
Get the value of idActeur*/
    public function getIdActeur()
    {
        return $this->idActeur;
    }

    /*
     
Set the value of idActeur*
@return  self*/
    public function setIdActeur($idActeur)
    {
        $this->idActeur = $idActeur;

        return $this;
    }

    /*
     
Get the value of idFilm*/
    public function getIdFilm()
    {
        return $this->idFilm;
    }

    /*
     
Set the value of idFilm*
@return  self*/
    public function setIdFilm($idFilm)
    {
        $this->idFilm = $idFilm;

        return $this;
    }

    /*
     
Get the value of id*/
    public function getId()
    {
        return $this->id;
    }

    /*
     
Set the value of id*
@return  self*/
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /*
     
Get the value of personnage*/
    public function getPersonnage()
    {
        return $this->personnage;
    }

    /*
     
Set the value of personnage*
@return  self*/
    public function setPersonnage($personnage)
    {
        $this->personnage = $personnage;

        return $this;
    }

    /**
     * Get the value of acteur
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * Set the value of acteur
     *
     * @return  self
     */
    public function setActeur($acteur)
    {
        $this->acteur = $acteur;

        return $this;
    }
}
