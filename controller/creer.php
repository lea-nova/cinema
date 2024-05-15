<?php

// use Model\entity\Acteur;
// use Model\repository\ActeurDao;
// use Model\entity\Film;
use Model\repository\FilmDao;

// $message = null;
// $offre = null;

// if (isset($_POST['title']) && isset($_POST['description'])) {

//     $offre = new Offre(null, $_POST['title'], $_POST['description']);

//     $offreDao = new OffreDAO();
//     $status = $offreDao::addOne($offre);
//     $message = $status ? "Ajout OK" : "Erreur Ajout";
// }

// $test = new ActeurDao();
// $acteurs = $test->getAll();
// // var_dump($acteurs);

// echo $twig->render('creer.html.twig', [
//     "acteurs" => $acteurs
//     // 'message' => $message,

// ]);

$test = new FilmDao();
$films = $test->getAll();
// var_dump($acteurs);
// $_POST["titre"] = null;

var_dump($_POST);

echo $twig->render('creer.html.twig', [
    "films" => $films
    // 'message' => $message,

]);
