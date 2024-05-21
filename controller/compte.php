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
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validation des champs
    if (empty($username)) {
        $errorUsername = "Le champs username est requis";
    }
    if (empty($email)) {
        $errorEmail = "Le champs email est requis";
    }
    if (empty($password)) {
        $errorPassword = "Le champs mot de passe est requis";
    }
    if (empty($confirm_password)) {
        $errorConfirmPassword = "Veuillez confirmer votre mot de passe";
    }




    if (!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password)) {
        if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
            $errorUsername = "Ne doit contenir que des lettres et des chiffres sans espace.";
        } else if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
            $errorEmail = "L'adresse email n'est pas valide.";
        } else if (strlen($password) < 4) {
            $errorPassword = "Le mot de passe doit contenir au moins 4 caractères.";
        } else if ($password !== $confirm_password) {
            $errorConfirmPassword = "Le mot de passe ne correspond pas.";
        } else {
            $user = new User(null, $username, $email, $password);
            $status = $userDao::addOne($user);
            if ($status) {
                $_SESSION["username"] = $user->getUsername();
                setcookie('id', $_POST["username"], time() + 3600);
                header("location: home");
                exit();
            } else {
                // Si l'ajout échoue, ajouter un message d'erreur
                $errorUsername = "Erreur lors de la création de l'utilisateur.";
            }
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


echo $twig->render(
    'compte.html.twig',
    [
        "user" => $user,
        "msgEmail" => $msgEmail,
        "msgMDP" => $msgMDP,
        "errorUsername" => $errorUsername,
        "errorEmail" => $errorEmail,
        "errorPassword" => $errorPassword,
        "errorConfirmPassword" => $errorConfirmPassword
    ]
);
