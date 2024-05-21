<?php

namespace Model\repository;

use Model\entity\Film;
use Model\entity\Role;
use Model\entity\Acteur;
use Model\repository\Dao;



class FilmDao extends Dao
{
    public static function getAll(string $recherche = ""): array
    {
        $query = self::$bdd->prepare("SELECT * FROM film WHERE upper(titre) LIKE  :titre ");
        $query->execute(array(':titre' => '%' . strtoupper($recherche) . '%'));
        $films = array();
        $filmDao = new FilmDao();
        while ($data = $query->fetch()) {
            $roles = array();
            $roles = $filmDao->getRole($data['id']);
            $films[] = new Film($data['id'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $roles);
        }
        return ($films);
    }

    //Ajouter un film
    public static function addOne($data): bool
    {

        $requete = 'INSERT INTO film (titre, realisateur, affiche, annee) VALUES (:titre, :realisateur, :affiche, :annee)';
        $valeurs = ['titre' => $data->getTitre(), 'realisateur' => $data->getRealisateur(), 'affiche' => $data->getAffiche(), 'annee' => $data->getAnnee()];
        $insert = self::$bdd->prepare($requete);
        return $insert->execute($valeurs);
    }

    //Récupérer plus d'info sur 1 film
    public static function getOne($titre): Film
    {
        $query = self::$bdd->prepare('SELECT * FROM film WHERE titre = :titre');
        $query->execute(array(':titre' => $titre));
        $data = $query->fetch();
        $roles = array();
        $acteurs = array();

        // Vérifiez que des données ont été récupérées
        if ($data && is_array($data)) {
            // Si des données ont été récupérées, créez les objets Role associés
            $roleQuery = self::$bdd->prepare('SELECT * FROM role JOIN acteur ON acteur.id = role.id_Acteur WHERE id_Film = :id_film ');
            $roleQuery->execute(array(':id_film' => $data['id']));
            while ($roleData = $roleQuery->fetch()) {
                $acteur = new Acteur($roleData['id'], $roleData['nom'], $roleData['prenom']);
                $role = new Role($roleData['id'], $roleData['personnage'], $acteur);
                $roles[] = $role;
            }
        }

        // Créez l'objet Film avec les rôles associés
        return new Film($data['id'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $roles);
    }


    public function addRole($role, $acteurId, $filmId)
    {
        $query = "INSERT INTO role (id_Acteur, id_Film, personnage )VALUES (:id_Acteur, :id_Film, :personnage)";
        $valeurs = (array(':id_Acteur' => $acteurId, ':id_Film' => $filmId, ':personnage' => $role->getPersonnage()));
        $insert = self::$bdd->prepare($query);
        return  $insert->execute($valeurs);
    }
    public function getRole($id): array
    {
        $roles = array();
        $query = self::$bdd->prepare("SELECT *  FROM `role` JOIN film ON film.id = role.id_Film JOIN acteur on role.id_Film = :id WHERE role.id_Acteur= acteur.id ");
        $query->execute(array(':id' => $id));
        while ($data = $query->fetch()) {
            $acteur = new Acteur($data['id'], $data['nom'], $data['prenom']);
            $role = new Role($data['id'], $data['personnage'], $acteur);
            $roles[] = $role;
        }
        return $roles;
    }
}
