<?php

use Model\repository\FilmDao;


$role = new FilmDao();
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search'])) {
    $films = $role->getAll($_POST['search']);
} else {
    $films = $role->getAll();
}
echo $twig->render('home.html.twig', [
    "films" => $films,
]);
