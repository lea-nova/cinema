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

    public static function getOne($id): Acteur
    {
        $query = self::$bdd->prepare('SELECT * from acteur WHERE id = :id_acteur');
        $query->execute(array(':id_acteur' => $id));
        $data = $query->fetch();
        return new Acteur($data['id'], $data['nom'], $data['prenom']);
    }

    public static function addOne($data): bool
    {
        $query = 'INSERT INTO acteur VALUES (:id, :nom, :prenom)';
        $value = ['id' => $data->getIdActeur(), 'nom' => $data->getNom(), 'prenom' => $data->getPrenom()];
        $insert = self::$bdd->prepare($query);
        return $insert->execute($value);
    }
}
