<?php

namespace Model\repository;

use Model\repository\Dao;
use Model\entity\User;


class UserDao extends Dao
{


    //Récupérer toutes les items
    public static  function getAll(): array
    {
        $query = self::$bdd->prepare(" SELECT * FROM utilisateur");
        $query->execute();
        $user = array();
        while ($data = $query->fetch()) {
            $acteurs[] = new User(
                $data["id"],
                $data["username"],
                $data["email"],
                $data["password"],
            );
        }
        return ($user);
    }


    //Récupérer plus d'info sur 1 item à l'aide de son id
    public static function getOne(int $id): Object
    {
        $query = self::$bdd->prepare('SELECT * from utilisateur WHERE id = :id_user');
        $query->execute(array(':id_user' => $id));
        $data = $query->fetch();
        return new User($data['id'], $data['username'], $data['email'], $data['password']);
    }

    //Ajouter un item
    public static function addOne(Object $data): bool
    {
        $query = self::$bdd->prepare('INSERT INTO utilisateur VALUES (:id, :username, :email, :password)');
        $value = ['id' => $data->getIdUser(), 'username' => $data->getUsername(), 'email' => $data->getEmail(), 'password' => $data->getPrenom()];
        $insert = self::$bdd->prepare($query);
        return $insert->execute($value);
    }
}
