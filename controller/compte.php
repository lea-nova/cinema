<?php

use Model\entity\User;
use Model\repository\UserDao;

$user = null;
$errors = [];
$values = [
    'username' => '',
    'email' => '',
    'password' => '',
    'confirm_password' => '',
    'login_email' => '',
    'login_password' => ''
];
$userDao = new UserDao();

if (isset($_POST["submit"])) { //bouton inscription
    // $values[..] reçoit les valeurs saisies par user
    $values['username'] = $_POST['username'];
    $values['email'] = $_POST['email'];
    $values['password'] = $_POST['password'];
    $values['confirm_password'] = $_POST['confirm_password'];

    if (empty($values['username'])) {
        $errors['username'] = "Le champs est requis";
    }
    if (empty($values['email'])) {
        $errors['email'] = "Le champs est requis";
    }
    if (empty($values['password'])) {
        $errors['password'] = "Le champs est requis";
    }
    if (empty($values['confirm_password'])) {
        $errors['confirm_password'] = "Veuillez confirmer votre mot de passe";
    }

    if (!empty($values['username']) || !empty($values['email']) || !empty($values['password']) || !empty($values['confirm_password'])) {
        if (!preg_match('/^[a-zA-Z0-9]+$/', $values['username'])) {
            $errors['username'] = "Ne doit contenir que des lettres et des chiffres sans espace.";
        } else if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $values['email'])) {
            $errors['email'] = "L'adresse email n'est pas valide.";
        } else if (strlen($values["password"]) < 4) {
            $errors['password'] = "Le mot de passe doit contenir au moins 4 caractères.";
        } else if ($values["password"] !== $values["confirm_password"]) {
            $errors['confirm_password'] = "Le mot de passe ne correspond pas.";
        } else {
            $user = new User(null, $values['username'], $values['email'], $values['password']);
            $status = $userDao::addOne($user);
            if ($status) {
                $_SESSION["username"] = $user->getUsername();
                // setcookie('id', $values["username"], time() + 60);
                header("Location: home");
                exit();
            } else {
                // Gérer le cas où la création de l'utilisateur échoue
                $errors["email"] = "L'email existe déjà";
                $errors['general'] = "Une erreur est survenue lors de l'inscription.";
            }
        }
    }
}

if (isset($_POST["cmd_valid"])) { // bouton Login
    $values['login_email'] = $_POST['login_email'];
    $values['login_password'] = $_POST['login_password'];

    if (empty($values["login_email"])) {
        $errors['login_email'] = "Le champs est obligatoire";
    }
    if (empty($values["login_password"])) {
        $errors['login_password'] = "Le champs est obligatoire";
    }

    if (!empty($values["login_email"]) && !empty($values["login_password"])) {
        $user = new User(null, null, $values["login_email"], $values["login_password"]);
        if ($userDao::checkLogin($user)) {
            $_SESSION["username"] = $userDao::getByEmail($values["login_email"])->getUsername();
            // setcookie('id', $values["login_email"], time() + 60);
            header("location:home");
        } else {
            $values['login_email'] = '';
            $values['login_password'] = '';
            $errors['login_email'] = "Email ou mot de passe incorrect.";
        }
    }
}


echo $twig->render(
    'compte.html.twig',
    [
        "user" => $user,
        "errors" => $errors,
        "values" => $values
    ]
);
