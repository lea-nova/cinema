<?php

namespace Model\entity;

use Exception;

class Role
{
    private ?int $idRole;
    private $personnage;
    private $acteur;


    public function __construct(?int $idRole, string $personnage, Acteur $acteur)
    {
        $this->setIdRole($idRole);
        $this->setPersonnage($personnage);
        $this->setActeur($acteur);
    }



    /*
     
Get the value of id*/
    public function getIdRole()
    {
        return $this->idRole;
    }

    /*
     
Set the value of id*
@return  self*/
    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;

        return $this;
    }


    /*
     
Get the value of personnage*/
    public function getPersonnage()
    {
        return $this->personnage;
    }

    /**
     * Set the value of acteur
     *
     * @return  self
     */
    public function setActeur($acteur)
    {
        if (isset($acteur) && !empty($acteur)) {
            # code...
            $this->acteur = $acteur;
        }

        return $this;
    }
    /*
     
Set the value of personnage*
@return  self*/
    public function setPersonnage($personnage)
    {
        if (isset($personnage) && !empty($personnage)) {
            $this->personnage = $personnage;
        } else {
            throw new Exception("Le champ doit être rempli.", 3);
        }
    }


    /**
     * Get the value of acteur
     */
    public function getActeur()
    {
        return $this->acteur;
    }
}
