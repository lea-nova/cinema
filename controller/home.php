<?php

//On affiche le template Twig correspondant

use Model\repository\UserDao;

$message = null;
$user = null;


$userDao = new UserDao();
$user = $userDao->getAll();

echo $twig->render('home.html.twig', ["message" => $message, "user" => $user]);
