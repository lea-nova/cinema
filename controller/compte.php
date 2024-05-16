<?php

use Model\entity\User;
use Model\repository\UserDao;

$user = null;
$msgEmail = "";
$msgMDP = "";
$userDao = new UserDao();




if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

    $user = new User(null, $_POST['username'], $_POST['email'], $_POST['password']);
    $status = $userDao::addOne($user);
    header("location: home");
}


if (isset($_POST["cmd_valid"])) {
    $msg = "";
    if (empty($_POST["login_email"])) {
        $msg .= "Le champs email est obligatoire";
    }
    if (empty($_POST["login_password"])) {
        $msg .= "Le champs mot de passe est obligatoire";
    }

    if (!empty($_POST["login_email"]) && !empty($_POST["login_password"])) {
        if ($userDao::checkLogin($_POST["login_email"], $_POST["login_password"])) {
            header("location: home");
        } else {
            header("location: error");
        }
    }
}




echo $twig->render('compte.html.twig', ["user" => $user, "msgEmail" => $msgEmail, "msgMDP" => $msgMDP]);
