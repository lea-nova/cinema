<?php

//On affiche le template Twig correspondant
$username = null;

use Model\repository\UserDao;

$userDao = new UserDao();
$user = $userDao::getAll();

$username = isset($_SESSION["email"]) ? $_SESSION["email"] : null;

echo $twig->render('home.html.twig', ["username" => $username]);
