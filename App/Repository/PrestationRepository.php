<?php

namespace App\Repository;

use PDO;
use App\db\Mysql;
use PDOException;
use App\Entity\Prestation;
use App\Tools\StringTools;

class PrestationRepository 
{
    public function findOneById(int $id)
    {
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();
        $query = $pdo->prepare('SELECT * FROM prestations WHERE id = :id');
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $prestation = $query->fetch($pdo::FETCH_ASSOC);
        $prestationEntity = new Prestation();

        foreach ($prestation as $key => $value) {
            $prestationEntity->{'set'.StringTools::toPascalCase($key)  }($value);
        }

        return $prestationEntity;
    }

    public function findAll()
    {
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();
        $query = $pdo->prepare('SELECT * FROM prestations');
        $query->execute();
        $prestations = $query->fetchAll(PDO::FETCH_ASSOC);

        return $prestations;
    }


    public function createPrestation(string $title, string $price, string $description, string $photo):void
    {
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();
        $statement = $pdo->prepare('INSERT INTO prestations (title, price, description, photo) VALUES (:title, :price, :description, :photo)');
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':price', $price, PDO::PARAM_STR);
        $statement->bindValue(':description', $description, PDO::PARAM_STR);
        $statement->bindValue(':photo', $photo, PDO::PARAM_STR);

        $statement->execute();
    }

    public function deleteById(int $id)
    {
        $mysql = Mysql::getInstance();
    
        try {
            $pdo = $mysql->getPDO();
            $query = $pdo->prepare('DELETE FROM prestations WHERE id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            throw new \Exception("Erreur lors de la suppression de la prestation.", 0, $e);
        }
    }
    
}