<?php

// use Model\entity\Acteur;
// use Model\repository\ActeurDao;
use Model\entity\Film;
use Model\entity\Role;
use Model\entity\Acteur;
use Model\repository\FilmDao;

$filmDao = new FilmDao();

$resultats = [];

// Vérifier si des données de recherche ont été soumises via POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search'])) {

    // Nettoyer et récupérer la chaîne de recherche
    $recherche = '%' . htmlspecialchars($_POST['input-search']) . '%';

    // Récupérer tous les films
    $tousLesFilms[] = $filmDao->getAll();


    // Parcourir tous les films pour comparer les titres
    foreach ($tousLesFilms as $film) {
        // Convertir le titre du film en minuscules pour une comparaison insensible à la casse
        $titreFilm = $film->getTitre();
        $titreRecherche = $recherche;

        if ($titreFilm == $titreRecherche) {

            $resultats[] = $film;
        }
    }

    // Passer les résultats de recherche au template Twig et afficher la vue
    echo $twig->render('rechercher.html.twig', ['resultats' => $resultats]);
}
