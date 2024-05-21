<?php


if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("location: home");
    exit;
}


echo $twig->render('header.html.twig');
