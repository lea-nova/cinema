<?php

if ($_SESSION) {
    echo $twig->render('compte.html.twig');
} else {
    echo $twig->render('login.html.twig');
}
