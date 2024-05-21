<?php

// use Model\entity\Acteur;
use Model\repository\ActeurDao;
use Model\entity\Film;
use Model\entity\Role;
use Model\entity\Acteur;
use Model\repository\FilmDao;

$filmDao = new FilmDao();
$resultats = [];


// Vérifier si des données de recherche ont été soumises via POST
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search'])) {

    $recherche = '%' . htmlspecialchars($_POST['input-search']) . '%';

    // Parcourir tous les films pour comparer les titres
    foreach ($filmDao->getAll() as $film) {
        $titre = $film->getTitre();
        if (stripos($titre, $_POST['input-search']) !== false) {
            $resultats[] = $titre;
        }
    }
}
echo $twig->render('rechercher.html.twig', ['resultats' => $resultats]);
