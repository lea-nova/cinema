<?php

// use Model\entity\Acteur;
// use Model\repository\ActeurDao;
use Model\entity\Film;
use Model\entity\Role;
use Model\entity\Acteur;
use Model\repository\FilmDao;

// $_POST['search'] = "test";

$film = new FilmDao();

if (empty($_POST["search"])) {
    $films = $film->getAll();
} else {
    $films = $film->getAll($_POST['search']);
    // Vérifier si aucun film n'a été renvoyé par la recherche
    if (empty($films)) {
        echo "Aucun film ne correspond à votre recherche.";
        $films = $film->getAll();
    }
}

echo $twig->render('home.html.twig', [
    "films" => $films,

]);
