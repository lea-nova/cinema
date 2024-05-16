<?php

use Model\entity\User;
use Model\repository\UserDao;

$user = null;
$username = null;
$msgEmail = "";
$msgMDP = "";
$userDao = new UserDao();




if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

    $user = new User(null, $_POST['username'], $_POST['email'], $_POST['password']);
    $status = $userDao::addOne($user);
    header("location: home");
}


if (isset($_POST["cmd_valid"])) {
    if (empty($_POST["login_email"])) {
        $msgEmail .= "Le champs email est obligatoire";
    }
    if (empty($_POST["login_password"])) {
        $msgMDP .= "Le champs mot de passe est obligatoire";
    }

    if (!empty($_POST["login_email"]) && !empty($_POST["login_password"])) {
        if ($userDao::checkLogin($_POST["login_email"], $_POST["login_password"])) {
            $_SESSION["email"] = $username;
            header("location: home");
        } else {
            $msgEmail = "Erreur d'identification";
        }
    }
}

$username = isset($_SESSION["email"]) ? $_SESSION["email"] : null;

echo $twig->render('compte.html.twig', ["user" => $user, "msgEmail" => $msgEmail, "msgMDP" => $msgMDP]);
