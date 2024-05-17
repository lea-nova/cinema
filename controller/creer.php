<?php

use Model\entity\Acteur;
use Model\repository\FilmDao;


$acteur = new Acteur(null, "fjfez", "fezf");
$test = new FilmDao();


$role = new FilmDao();
$films = $role->getAll();



echo $twig->render('creer.html.twig', [
    "films" => $films,
    // "films" => $films,
    // "roles" => $role,
    // "acteurs" => $acteur,
    // 'message' => $message,

]);
