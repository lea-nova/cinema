<?php

namespace Model\entity;

class Role
{
    private $id;
    private $personnage;

    public function __construct(int $id, string $personnage = "")
    {
        $this->setId($id);
        $this->setPersonnage($personnage);
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
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of personnage
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }

    /**
     * Set the value of personnage
     *
     */
    public function setPersonnage($personnage)
    {
        $this->personnage = $personnage;

        return $this;
    }
}
