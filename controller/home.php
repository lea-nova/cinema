<?php

//On affiche le template Twig correspondant

use Model\repository\UserDao;



$userDao = new UserDao();
$user = $userDao::getAll();

echo $twig->render('home.html.twig');
