<?php

//On affiche le template Twig correspondant

use Model\repository\UserDao;

$user = null;


$userDao = new UserDao();
$user = $userDao->getAll();

echo $twig->render('home.html.twig', ["user" => $user]);
