<?php

namespace Model\repository;

use Model\entity\Acteur;

class ActeurDao extends Dao
{
    public static function getAll(): array
    {
        $query = SPDO::getInstance()->prepare(" SELECT* FROM acteur");
        $query->execute();
        $acteurs = array();
        while ($data = $query->fetch()) {
            $acteurs[] = new Acteur(
                $data["id"],
                $data["nom"],
                $data["prenom"],
            );
        }
        return ($acteurs);
    }
}
