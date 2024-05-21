<?php


use Model\entity\User;
use Model\repository\UserDao;

$user = null;
$msgEmail = "";
$msgMDP = "";
$errorUsername = "";
$errorEmail = "";
$errorPassword = "";
$errorConfirmPassword = "";
$userDao = new UserDao();

if (isset($_POST["submit"])) {
    if (empty($_POST['username'])) {
        $errorUsername = "Le champs username est requis";
    }
    if (empty($_POST['email'])) {
        $errorEmail = "Le champs email est requis";
    }
    if (empty($_POST["password"])) {
        $errorPassword = "Le champs mot de passe est requis";
    }
    if (empty($_POST["confirm_password"])) {
        $errorConfirmPassword = "Veuillez confirmer votre mot de passe";
    }

    if (!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['confirm_password'])) {
        if (!preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])) {
            $errorUsername = "Ne doit contenir que des lettres et des chiffres sans espace.";
        } else if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $_POST['email'])) {
            $errorEmail = "L'adresse email n'est pas valide.";
        } else if (strlen($_POST["password"]) < 4) {
            $errorPassword = "Le mot de passe doit contenir au moins 4 caractères.";
        } else if ($_POST["password"] !== $_POST["confirm_password"]) {
            $errorConfirmPassword = "Le mot de passe ne correspond pas.";
        } else {
            $user = new User(null, $_POST['username'], $_POST['email'], $_POST['password']);
            $status = $userDao::addOne($user);
            $_SESSION["username"] = $user->getUsername();
            setcookie('id', $_POST["username"], time() + 3600);
            header("location: home");
        }
    }
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
            $_SESSION["username"] = $userDao::getbyUsername($_POST["login_email"])->getUsername();
            setcookie('id', $_POST["login_email"], time() + 3600);
            header("location:home");
        } else {
            $msgEmail = "Erreur d'identification";
        }
    }
}




echo $twig->render('compte.html.twig', ["user" => $user, "msgEmail" => $msgEmail, "msgMDP" => $msgMDP]);
