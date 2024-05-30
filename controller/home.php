<?php

use Model\repository\FilmDao;

$role = new FilmDao();
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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search'])) {
    $films = $role->getAll($_POST['search']);
} else {
    $films = $role->getAll();
}
echo $twig->render('home.html.twig', [
    "films" => $films,

]);
