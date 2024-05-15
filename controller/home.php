<?php

use Model\repository\FilmDao;
use Model\repository\Role;

//On appelle la fonction getAll()
$filmDao = new FilmDao();
$films = $filmDao->getAll();




//On affiche le template Twig correspondant
echo $twig->render('home.html.twig', ['films' => $films]);
