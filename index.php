<?php

// ******************** Controller pricipal ***************************************


// Initialisation de l'environnement

// Load Our autoloader

require './config/init.php';



// ************         Affichage du header  ***************************************
require './controller/header.php';



// ************          Gestion de Routing ***************************************
$routes = [
    '/' => './controller/home.php',
    'home' => './controller/home.php',
    'creer' => './controller/creer.php',
    'delete' => './controller/delete.php',
    'update' => './controller/update.php',
];

$controller = isset($_GET['action']) ?  $_GET['action'] : '/';

if (array_key_exists($controller, $routes)) {
    require $routes[$controller];
} else {
    require 'controller/erreur.php';
}


// ************          Affichage du footer  ***************************************
require './controller/footer.php';
