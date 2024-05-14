
<?php

namespace Model\entity;


class Film
{

    private $id;
    private $titre;
    private $realisateur;
    private $affiche;
    private $annee;

    public function __construct(int $id, string $titre, string $realisateur, string $affiche, int $annee)
    {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setRealisateur($realisateur);
        $this->setAffiche($affiche);
        $this->setAnnee($annee);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

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
        $this->titre = $titre;

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
        $this->realisateur = $realisateur;

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
        $this->annee = $annee;

        return $this;
    }
}
=======
<?php

namespace Model\entity;


class Film
{

    private $id;
    private $titre;
    private $realisateur;
    private $affiche;
    private $annee;

    public function __construct(int $id, string $titre, string $realisateur, string $affiche, string $annee)
    {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setRealisateur($realisateur);
        $this->setAffiche($affiche);
        $this->setAnnee($annee);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

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
        $this->titre = $titre;

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
        $this->realisateur = $realisateur;

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
        $this->annee = $annee;

        return $this;
    }
}
