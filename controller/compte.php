<?php

use Model\entity\User;
use Model\repository\UserDao;


$user = null;
$msg = "Saisie obligatoire";


if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {

    $user = new User(null, $_POST['username'], $_POST['email'], $_POST['password']);

    $userDao = new UserDao();
    $status = $userDao::addOne($user);
}



$logins = array();

if (isset($_POST["cmd_valid"])) {
    $msg = "";
    if (empty($_POST["email"])) {
        $msg .= "Le champs email est obligatoire<br>";
    }
    if (empty($_POST["password"])) {
        $msg .= "Le champs mot de passe est obligatoire<br>";
    }

    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        if ((array_key_exists($_POST["email"], $logins) && $logins[$_POST["email"]] === $_POST["password"])) {
            setcookie("id", $_POST["email"], time() + 3600);
            header("location:form2.php");
        } else {
            $msg .= "Erreur d'identification";
        }
    }
}

echo $twig->render('compte.html.twig', ["user" => $user, "msg" => $msg]);
