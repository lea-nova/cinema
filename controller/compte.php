<?php


use Model\entity\User;
use Model\repository\UserDao;


$user = null;


if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

    $user = new User(null, $_POST['username'], $_POST['email'], $_POST['password']);

    $userDao = new UserDao();
    $status = $userDao::addOne($user);
}

echo $twig->render('compte.html.twig', ["user" => $user]);
