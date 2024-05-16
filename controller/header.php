<?php


if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    setcookie('id', $_POST["login_email"], time() - 3600);
    header("location: home");
    exit;
}


echo $twig->render('header.html.twig');
