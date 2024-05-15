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

        $query = self::$bdd->prepare("SELECT film.id, film.titre, film.realisateur, film.affiche, film.annee, role.id, role.personnage, acteur.id, acteur.nom, acteur.prenom FROM film JOIN role ON role.id_Film = film.id JOIN acteur ON role.id_Acteur = acteur.id");
        $query->execute();
        $films = array();

        while ($data = $query->fetch()) {
            $films[] = new Film($data['id'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], new Role($data['id'], $data['personnage'], new Acteur($data['id'], $data['nom'], $data['prenom'])));
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
        $query = self::$bdd->prepare('SELECT * FROM film WHERE id = :id_film');
        $query->execute(array(':id_film' => $id));
        $data = $query->fetch();
        return new Film($data['id'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], new Role($data['id'], $data['personnage'], new Acteur($data['id'], $data['nom'], $data['prenom'])));
    }


    // Au final il faudrait plutot faire une fonction comme : 

    public function descriptionFilm($id)
    {

        $film = FilmDao::getOne($id);
        // et ici on met ce que l'on a mis dans getAll();

    }

    // et une autre pour récupérer le titre ou une partie du titre pour la fonction rechercher :

    public function rechercheTitre()
    {
        // et qui utilisera surement la description pour ensuite afficher dans le caroussel. 
        // par la recherche de film il faut pouvoir afficher tous les films qui ont ce que l'utilisateur a tapé dans la barre de recherche. 

// il faut faire une requête pour SELECT * from titre WHERE titre = :titre etc.... 
    }
}
