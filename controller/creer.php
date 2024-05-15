<?php

// use Model\entity\Acteur;
// use Model\repository\ActeurDao;
use Model\entity\Film;
use Model\entity\Role;
use Model\entity\Acteur;
use Model\repository\FilmDao;

// $message = null;
// var_dump($_POST);

// $test = new ActeurDao();
// $acteurs = $test->getAll();
// // var_dump($acteurs);

// echo $twig->render('creer.html.twig', [
//     "acteurs" => $acteurs
//     // 'message' => $message,

// ]);

$acteur = new Acteur(null, "fjfez", "fezf");
// $role = new Role(null, "jfoijef", $acteur);
$test = new FilmDao();
// $films = $test->getRole($id);
// var_dump($films);
$id = 1;
$role = new FilmDao();
$films = $role->getAll();
var_dump($films);

// var_dump($role);

// $role->addRoleToFilm($id);
// // $testFilm = $role->addRoleToFilm($id);


echo $twig->render('creer.html.twig', [
    "films" => $films,
    // "films" => $films,
    // "roles" => $role,
    // "acteurs" => $acteur,
    // 'message' => $message,

]);
