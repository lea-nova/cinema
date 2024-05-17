<?php
$logins = array('macléquimeconnecte@hr.fr' => "monmdp"); // pas en bdd
$loginsHash = array('macléquimeconnecte@hr.fr' => 'mdphaché');


if (empty($_POST['search'])) {
    $msg = "";
    if (empty($_POST['mail'])) {
        $msg .=  "Mail doit être renseigné.";
    }
    if (empty($_POST["password"])) {
        $msg .= "Mdp doit être renseigné.";
    }
    if (!empty($_POST['mail'] && !empty($_POST['password']))) {
        password_hash('cequejerécupère de mon $_POST["password"]', PASSWORD_BCRYPT, ['cost' => 12]);
    }

    // comparer mdp clair  avec ce qu'on a en bdd
    // mdp login a comparé avec 
    // pour mettr een bdd oui mais au lieu que ce soit en tableau il faut fiare un getOne du User avec son adresse mail pour récupérer le bon mdp : "(array_key_exists($_POST["mail"], $loginsHash)" remplacer ca par un getOne du UserDao avec son mail pour récup le bon mdp et voir si il correspond au mdp saisi dans le champ/ 
    // avant de l'identifier il faut créer un utilisateur (sign up) et là on save les infos en bdd. 
    //password_verify($_POST["password"], $loginsHash($_POST['mail'])) : on saisi mail et mdp il connecte si c'est correct. 

    //
    if (array_key_exists($_POST["mail"], $loginsHash) && password_verify($_POST["password"], $loginsHash($_POST['mail']))) {
    } else {
        $msg .= "Erreur id";
    }
}
