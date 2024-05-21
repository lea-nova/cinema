<?php

namespace Model\repository;

use Model\entity\Acteur;

class ActeurDao extends Dao
{
    public static function getAll(string $recherche = ""): array
    {
        $query = self::$bdd->prepare(" SELECT * FROM acteur");
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

    public static function getOne($nom): Acteur
    {
        $query = self::$bdd->prepare('SELECT * from acteur WHERE nom = :nom');
        $query->execute(array(':nom' => $nom));
        $data = $query->fetch();
        return new Acteur($data['id'], $data['nom'], $data['prenom']);
    }

    public static function addOne($data): bool
    {
        $query = 'INSERT INTO acteur (nom, prenom)  VALUES ( :nom, :prenom)';
        $value = [':nom' => $data->getNom(), ':prenom' => $data->getPrenom()];
        $insert = self::$bdd->prepare($query);
        return $insert->execute($value);
    }
}
