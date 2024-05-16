<?php

namespace Model\repository;

use Model\entity\Film;
use Model\entity\Role;
use Model\entity\Acteur;
use Model\repository\Dao;



class FilmDao extends Dao
{
    public static function getAll(): array
    {
        $query = self::$bdd->prepare("SELECT * FROM film JOIN role ON role.id_Film=film.id JOIN acteur ON acteur.id = role.id_Acteur GROUP BY film.id");
        $query = self::$bdd->prepare("SELECT * FROM film JOIN role ON role.id_Film=film.id JOIN acteur ON acteur.id = role.id_Acteur GROUP BY film.id");
        $query->execute();
        $films = array();
        $filmDao = new FilmDao();
        $filmDao = new FilmDao();
        while ($data = $query->fetch()) {
            $roles = array();
            $roles = $filmDao->getRole($data['id_Film']);
            $films[] = new Film($data['id'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $roles);
            $roles = array();
            $roles = $filmDao->getRole($data['id_Film']);
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
    public static function getOne(int $id): Film
    {
        $query = self::$bdd->prepare('SELECT 
        film.id, film.titre, film.realisateur, film.affiche, film.annee, 
        role.id, role.personnage, 
        acteur.id, acteur.nom, acteur.prenom 
                FROM film 
                JOIN role ON role.id_Film = film.id 
                JOIN acteur ON role.id_Acteur = acteur.id
                WHERE film.id = :id');
        $query->execute(array(':id' => $id));
        $data = $query->fetch();
        $roles = array();
        while ($data = $query->fetch()) {
            $acteur = new Acteur($data['id'], $data['nom'], $data['prenom']);
            $role = new Role($data['id'], $data['personnage'], $acteur);
            $roles[] = $role;
        }

        return new Film($data['id'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $roles);
    }

    public function addRole($idFilm, $idRole, $personnage)
    {
        $query = self::$bdd->prepare("INSERT INTO role (id_film, id_acteur, personnage) VALUES (:film_id, :role_id, :personnage)");
        $query->bindParam(':film_id', $idFilm, \PDO::PARAM_INT);
        $query->bindParam(':role_id', $idRole, \PDO::PARAM_INT);
        $query->bindParam(':personnage', $personnage, \PDO::PARAM_STR);
        return $query->execute();
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
        $roles = array();
        $role = new Role($data['id'], $data['personnage'], new Acteur($data['id'], $data['nom'], $data['prenom']));

        return  $films[] = new Film($data['id'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $roles[$role]);
    }
}
