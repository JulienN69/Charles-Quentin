<?php

namespace App\Repository;

use PDO;
use App\Db\Mysql;
use PDOException;
use App\Entity\User;

class UserRepository 
{
    // public function findUserByEmail(string $email)
    // {
    //     try {
    //         $mysql = Mysql::getInstance();
    //         $pdo = $mysql->getPDO();

    //         $query = $pdo->prepare('SELECT * FROM user WHERE email = :email');
    //         $query->bindParam(':email', $email, PDO::PARAM_STR);
            
    //         $query->execute();

    //         $user = $query->fetch(PDO::FETCH_ASSOC);

    //         // Retournez le résultat de la requête
    //         return $user ? $user : null;
        
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //         throw new \Exception("Erreur lors de la récupération de l'utilisateur par e-mail.");
    //     }
    // }


    public function findUserByEmail(string $email)
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $query = $pdo->prepare('SELECT * FROM user WHERE email = :email');
            $query->bindParam(':email', $email, PDO::PARAM_STR);

            $query->execute();

            $userData = $query->fetch(PDO::FETCH_ASSOC);

            if ($userData) {
                $user = new User();
                $user->setEmail($userData['email']);
                $user->setPassword($userData['password']);
            } 
            return $user;
        
        } catch (PDOException $e) {
            echo $e->getMessage();
            throw new \Exception("Erreur lors de la récupération de l'utilisateur par e-mail.");
        }
    }


    function verifyUserLoginPassword(PDO $pdo, string $email, string $password) {
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
    
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
