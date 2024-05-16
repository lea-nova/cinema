<?php

use Model\repository\FilmDao;


$role = new FilmDao();
$films = $role->getAll();

echo $twig->render('home.html.twig', [
    "films" => $films
]);
