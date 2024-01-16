<?php

namespace App\Repository;

use PDO;
use PDOException;
use App\db\Mysql;

class UserRepository 
{
    public function findUserByEmail(string $email)
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();

            $query = $pdo->prepare('SELECT * FROM user WHERE email = :email');
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            
            $query->execute();

            $user = $query->fetch(PDO::FETCH_ASSOC);

            return $user;
        } catch (PDOException $e) {

            echo $e->getMessage();
            throw new \Exception("Erreur lors de la récupération de l'utilisateur par e-mail.");
        }
    }
}