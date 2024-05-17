<?php

// use Model\entity\Acteur;
// use Model\repository\ActeurDao;
use Model\entity\Film;
use Model\entity\Role;
use Model\entity\Acteur;
use Model\repository\FilmDao;

// $_POST['search'] = "test";

$role = new FilmDao();
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search'])) {
    $films = $role->getAll($_POST['search']);
} else {
    $films = $role->getAll();
}
echo $twig->render('home.html.twig', [
    "films" => $films,
]);
