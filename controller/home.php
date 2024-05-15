<?php
$_SESSION["user"] = "fjzoizojf";
// var_dump($_SESSION);
unset($_SESSION['user']);

//On affiche le template Twig correspondant

// // var_dump($_SESSION);
// unset($_SESSION['user']);
echo $twig->render('home.html.twig');
