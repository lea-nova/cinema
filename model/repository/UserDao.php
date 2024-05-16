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
            $user[] = new User(
                $data["id"],
                $data["username"],
                $data["email"],
                $data["password"],
            );
        }
        return ($user);
    }


    //Récupérer plus d'info sur 1 item à l'aide de son id
    public static function getOne($id): Object
    {
        $query = self::$bdd->prepare('SELECT * from utilisateur WHERE id = :id');
        $query->execute(array(':id' => $id));
        $data = $query->fetch();
        return new User($data['id'], $data['username'], $data['email'], $data['password']);
    }

    //Ajouter un item
    public static function addOne(Object $data): bool
    {
        $query = 'INSERT INTO utilisateur (username, email, password) VALUES (:username, :email, :password)';
        $value = ['username' => $data->getUsername(), 'email' => $data->getEmail(), 'password' => $data->getPassword()];
        $insert = self::$bdd->prepare($query);
        return $insert->execute($value);
    }

    public static function checkLogin($email, $password)
    {
        $query = self::$bdd->prepare("SELECT * from utilisateur where email = :email");
        $query->bindParam(":email", $email);
        $query->execute();
        $user = $query->fetch();
        if ($user && $user['password'] === $password) {
            return true;
        } else {
            return false;
        }
    }
}
