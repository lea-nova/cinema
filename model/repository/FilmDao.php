<?php

namespace Model\repository;

use Model\entity\Film;
use Model\entity\Role;
use Model\entity\Acteur;
use Model\repository\ActeurDao;
use Model\repository\Dao;



class FilmDao extends Dao
{
    public static function getAll(string $recherche = ""): array
    {
        $query = self::$bdd->prepare("SELECT * FROM film WHERE upper(titre) LIKE  :titre ");
        $query->execute(array(':titre' => '%' . strtoupper($recherche) . '%'));
        $films = array();
        // $filmDao = new FilmDao();
        while ($data = $query->fetch()) {
            $roles = array();
            $roleQuery = self::$bdd->prepare('SELECT * FROM role JOIN acteur ON acteur.id = role.id_Acteur WHERE id_Film = :id_film ');
            $roleQuery->execute(array(':id_film' => $data['id']));
            while ($roleData = $roleQuery->fetch()) {
                $acteur = new Acteur($roleData['id'], $roleData['nom'], $roleData['prenom']);
                $role = new Role($roleData['id'], $roleData['personnage'], $acteur);
                $roles[] = $role;
            }
            $films[] = new Film($data['id'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $roles);
        }
        return ($films);
    }

    //Ajouter un film
    public static function addOne($data): bool
    {
        $query = 'INSERT INTO film (titre, realisateur, affiche, annee) VALUES ( :titre, :realisateur, :affiche, :annee)';
        $value = [
            ':titre' => $data->getTitre(), ':realisateur' => $data->getRealisateur(),
            ':affiche' => $data->getAffiche(), ':annee' => $data->getAnnee()
        ];
        $insert = self::$bdd->prepare($query);
        return $insert->execute($value);
    }

    //Récupérer plus d'info sur 1 film
    public static function getOne($titre): Film
    {
        $query = self::$bdd->prepare('SELECT * FROM film WHERE titre = :titre');
        $query->execute(array(
            ':titre' => $titre
        ));
        $data = $query->fetch();
        $roles = array();
        // $acteur = array();

        // Vérifiez que des données ont été récupérées
        if ($data && is_array($data)) {
            // Si des données ont été récupérées, créez les objets Role associés
            $roleQuery = self::$bdd->prepare('SELECT * FROM role JOIN acteur ON acteur.id = role.id_Acteur WHERE id_Film = :id_film ');
            $roleQuery->execute(array(':id_film' => $data["id"]));
            while ($roleData = $roleQuery->fetch()) {
                $acteur = new Acteur($roleData['id'], $roleData['nom'], $roleData['prenom']);
                $role = new Role($roleData['id'], $roleData['personnage'], $acteur);
                $roles[] = $role;
            }
        }
        return new Film($data['id'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $roles);
    }

    public function addRole($role, $acteurId, $filmId)
    {
        $query = "INSERT INTO role (id_Acteur, id_Film, personnage )VALUES (:id_Acteur, :id_Film, :personnage)";
        $valeurs = (array(':id_Acteur' => $acteurId, ':id_Film' => $filmId, ':personnage' => $role->getPersonnage()));
        $insert = self::$bdd->prepare($query);
        return  $insert->execute($valeurs);
    }
}
