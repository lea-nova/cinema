<?php

namespace Model\entity;

class Role
{
    private $idRole;

    private $id;
    private $personnage;
    private $acteur;
    private $acteur;

    public function __construct(int $idRole, string $personnage, Acteur $acteur)


    public function __construct(int $id, string $personnage, Acteur $acteur)
    {
        $this->setIdRole($idRole);
        $this->setId($id);
        $this->setPersonnage($personnage);
        $this->setActeur($acteur);
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

    /**
     * Get the value of acteur
     */
    public function getActeur()
    /*
     
Get the value of personnage*/
    public function getPersonnage()
    {
        return $this->acteur;
    }

    /**
     * Set the value of acteur
     *
     * @return  self
     */
    public function setActeur($acteur)
    /*
     
Set the value of personnage*
@return  self*/
    public function setPersonnage($personnage)
    {
        $this->acteur = $acteur;

        return $this;
    }
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
