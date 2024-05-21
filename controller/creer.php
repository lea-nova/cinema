<?php

// use Model\entity\Acteur;
// use Model\repository\ActeurDao;
use Model\entity\Film;
use Model\entity\Role;
use Model\entity\Acteur;
use Model\repository\FilmDao;
use Model\repository\ActeurDao;

$errors = [];

try {
    if (empty($_POST["nom"]) && empty($_POST["prenom"]) && empty($_POST['personnage']) && empty($_POST["titre"]) && empty($_POST["realisateur"]) && empty($_POST["affiche"]) && empty($_POST["annee"])) {
        throw new Exception("Tous les champs doivent être remplis.", 8);
    };
    $roles = [];
    $filmDao = new FilmDao();
    $acteurDao = new ActeurDAo();
    $acteurSendToBdd = new Acteur(null, $_POST["nom"], $_POST["prenom"]);
    ActeurDao::addOne($acteurSendToBdd);
    $acteur = ActeurDao::getOne($_POST["nom"]);
    $acteurId = $acteur->getIdActeur();

    $roleSendToBdd = new Role(null, $_POST["personnage"], $acteur);
    $roles[] = $roleSendToBdd;

    $filmsToBdd = new Film(null, $_POST['titre'], $_POST['realisateur'], $_POST['affiche'], $_POST["annee"], $roles);
    // $films = FilmDao::getAll($_POST['titre']);
    FilmDao::addOne($filmsToBdd);

    $filmms = FilmDao::getAll($_POST['titre']);
    // $filmId = $filmms->getIdFilm();

    foreach ($roles as $role) {
        $filmDao->addRole($role, ActeurDao::getOne($_POST["nom"])->getIdActeur(), FilmDao::getOne($_POST['titre'])->getIdFilm());
    }
} catch (Exception $e) {
    switch ($e->getCode()) {
        case 1:
            $errors["prenom"] = $e->getMessage();
            break;
        case 2:
            $errors["nom"] = $e->getMessage();
            break;
        case 3:
            $errors["personnage"] = $e->getMessage();
            break;
        case 4:
            $errors["annee"] = $e->getMessage();
            break;
        case 5:
            $errors["affiche"] = $e->getMessage();
            break;
        case 6:
            $errors["realisateur"] = $e->getMessage();
            break;
        case 7:
            $errors["titre"] = $e->getMessage();
            break;
        case 8:
            $errors["autre"] = $e->getMessage();
            break;
        default:
            echo "Erreur";
            break;
    }
}

echo $twig->render('creer.html.twig', [
    "errors" => $errors,
    // "films" => $films,
    // "roles" => $role,
    // "acteurs" => $acteur,
    // 'message' => $message,

]);
