<?php

use Model\repository\OffreDAO;

//On appelle la fonction getAll()
$offreDao = new OffreDAO();

$offres = $offreDao->getAll();

unset($_SESSION['user']);
// $_SESSION['user'] = 'vince@afpa.com';

//On affiche le template Twig correspondant
echo $twig->render('home.html.twig', ['offres' => $offres]);
