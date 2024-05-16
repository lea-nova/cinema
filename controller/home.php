<?php

// use Model\entity\Acteur;
// use Model\repository\ActeurDao;
use Model\entity\Film;
use Model\entity\Role;
use Model\entity\Acteur;
use Model\repository\FilmDao;


$role = new FilmDao();
$films = $role->getAll();

echo $twig->render('home.html.twig', [
    "films" => $films
]);
