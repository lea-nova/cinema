<?php

namespace Model\entity;

class Acteur
{
    private int $idActeur;
    private  string $nom;
    private string $prenom;

    public function __construct(int $idActeur, string $nom, string $prenom)
    {
        $this->setIdActeur($idActeur);
        $this->setNom($nom);
        $this->setPrenom($prenom);
    }

    /**
     * Get the value of id
     */
    public function getIdActeur()
    {
        return $this->idActeur;
    }

    /**
     * Set the value of id
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
        $this->nom = $nom;

        return $this;
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
        $this->prenom = $prenom;

        return $this;
    }
}
