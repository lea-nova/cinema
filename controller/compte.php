<?php

use Model\entity\User;
use Model\repository\UserDao;

$user = null;
$username = null;
$msgEmail = "";
$msgMDP = "";
$userDao = new UserDao();




if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
    $user = new User(null, $_POST['username'], $_POST['email'], $_POST['password']);
    $status = $userDao::addOne($user);
    $_SESSION["username"] = $userDao::getbyUsername($_POST["login_email"]);
    header("location: home");
}


if (isset($_POST["cmd_valid"])) {
    if (empty($_POST["login_email"])) {
        $msgEmail = "Le champs email est obligatoire";
    }
    if (empty($_POST["login_password"])) {
        $msgMDP = "Le champs mot de passe est obligatoire";
    }

    if (!empty($_POST["login_email"]) && !empty($_POST["login_password"])) {
        if ($userDao::checkLogin($_POST["login_email"], $_POST["login_password"])) {
            $_SESSION["username"] = $userDao::getbyUsername($_POST["login_email"]);
            setcookie('id', $_POST["login_email"], time() + 3600);
            header("location:home");
        } else {
            $msgEmail = "Erreur d'identification";
        }
    }
}




echo $twig->render('compte.html.twig', ["user" => $user, "msgEmail" => $msgEmail, "msgMDP" => $msgMDP]);
