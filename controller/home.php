<?php

//On affiche le template Twig correspondant

use Model\repository\FilmDao;
use Model\repository\UserDao;

$userDao = new UserDao();
$user = $userDao::getAll();

// $filmDao = new FilmDao();
// $films = $filmDao::getAll();

echo $twig->render('home.html.twig');
