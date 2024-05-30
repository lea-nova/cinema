<?php

namespace Model\repository;

use Model\repository\Dao;
use Model\entity\User;


class UserDao extends Dao
{
    //Récupérer toutes les items
    public static  function getAll(string $recherche = ""): array
    {
        $query = self::$bdd->prepare("SELECT * FROM utilisateur");
        $query->execute(array(":title" => $recherche));
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
        $hashed_password = password_hash($data->getPassword(), PASSWORD_BCRYPT);
        $query = 'INSERT INTO utilisateur (username, email, password) VALUES (:username, :email, :password)';
        $value = ['username' => $data->getUsername(), 'email' => $data->getEmail(), 'password' => $hashed_password];
        $insert = self::$bdd->prepare($query);
        return $insert->execute($value);
    }

    // checker si les infos fournis par l'utlisateur correspondent aux infos de la base de données
    public static function checkLogin(User $user)
    {
        $query = self::$bdd->prepare("SELECT * from utilisateur where email = :email");
        $query->bindValue(":email", $user->getEmail());
        $query->execute();
        $dbUser = $query->fetch();
        if ($dbUser && password_verify($user->getPassword(), $dbUser["password"])) {
            return true;
        } else {
            return false;
        }
    }

    // récupérer l'username dans la table utilisateur
    public static function getbyUsername($email): Object
    {
        $query = self::$bdd->prepare('SELECT username from utilisateur WHERE email = :email');
        $query->execute(array(':email' => $email));
        $data = $query->fetch();
        return new User($data['id'], $data['username'], $data['email'], $data['password']);
    }
}
