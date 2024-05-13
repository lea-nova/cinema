<?php

use Model\entity\Offre;
use Model\repository\OffreDAO;

$message = null;
$offre = null;

if (isset($_POST['title']) && isset($_POST['description'])) {

    $offre = new Offre(null, $_POST['title'], $_POST['description']);

    $offreDao = new OffreDAO();
    $status = $offreDao::addOne($offre);
    $message = $status ? "Ajout OK" : "Erreur Ajout";
}
echo $twig->render('creer.html.twig', [
    'message' => $message,
    'offre' => $offre
]);
