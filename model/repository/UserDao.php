<?php

namespace Model\repository;

use Model\repository\Dao;


class UserDao extends Dao
{


    //Récupérer toutes les items
    public static  function getAll(): array
    {
        return array();
    }


    //Récupérer plus d'info sur 1 item à l'aide de son id
    public static function getOne(int $id): Object
    {
        return new $id;
    }

    //Ajouter un item
    public static function addOne(Object $data): bool
    {
        return true;
    }

    //Supprimer un item
    // abstract public static function deleteOne(int $id): bool;

    //Modifier un item
    // abstract public static function updateOne(Object $data): bool;
}
