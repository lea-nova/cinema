<?php

namespace Model\repository;

use Model\repository\SPDO;

abstract class Dao
{
    protected static $bdd = null;

    public function __construct()

    {
        // Connexion Database
        try {
            self::$bdd = SPDO::getInstance();
            self::$bdd->query("SET NAMES UTF8");
        } catch (\Exception $e) {
            echo "Problème de connexion à la base de donnée ...";
            die();
        }
    }

    //Récupérer toutes les items
    abstract public static function getAll(): array;

    // //Récupérer plus d'info sur 1 item à l'aide de son id
    abstract public static function getOne(int $id): Object;

    // //Ajouter un item
    abstract public static function addOne(Object $data): bool;

    //Supprimer un item
    // abstract public static function deleteOne(int $id): bool;

    //Modifier un item
    // abstract public static function updateOne(Object $data): bool;
}
