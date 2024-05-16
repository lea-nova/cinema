<?php

use Model\repository\FilmDao;

//On appelle la fonction getAll()
$filmDao = new FilmDao();
$films = $filmDao->getAll();


// $id = intval($_GET['id']);
// $film = FilmDao::getOne($id);


//On affiche le template Twig correspondant
echo $twig->render('home.html.twig', ['films' => $films]);
