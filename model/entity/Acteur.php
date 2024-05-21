<?php

namespace Model\entity;



use PDO;
use PDOException;
use Exception;
use Model\entity\Role;

class Acteur
{
    private ?int $idActeur;
    private  string $nom;
    private string $prenom;

    public function __construct(?int $idActeur, string $nom, string $prenom)
    {
        $this->setIdActeur($idActeur);
        $this->setNom($nom);
        $this->setPrenom($prenom);
    }

    /**
     * Get the value of idActeur
     */
    public function getIdActeur()
    {
        return $this->idActeur;
    }

    /**
     * Set the value of idActeur
     *
     * @return  self
     */
    public function setIdActeur($idActeur)
    {
        $this->idActeur = $idActeur;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        if (isset($nom) &&  !empty($nom)) {
            return $this->nom = $nom;
        } else {
            throw new Exception("Le champ n'est pas saisi correctement.", 2);
        }
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        if (isset($prenom) && !empty($prenom)) {
            return  $this->prenom = $prenom;
        } else {
            throw new Exception("Le champ ne peut être vide.", 1);
        }
    }
}
