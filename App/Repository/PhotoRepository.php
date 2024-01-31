<?php

namespace App\Repository;

use PDO;
use App\db\Mysql;
use PDOException;

class PhotoRepository 
{
    public function findAllByGalleryId(int $gallery_id)
    {
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();
        $query = $pdo->prepare('SELECT * FROM photo WHERE gallery_id = :gallery_id');
        $query->bindParam(':gallery_id', $gallery_id, PDO::PARAM_INT);
        $query->execute();
        $photos = $query->fetchAll(PDO::FETCH_ASSOC);

        return $photos;
    }

    public function findAll()
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();

        try {
            $query = $pdo->prepare('SELECT * FROM photo');
            $query->execute();
            $photos = $query->fetchAll(PDO::FETCH_ASSOC);

            return $photos;
        } catch (PDOException $e) {
            // Gestion des erreurs ici (affichage, journalisation, etc.)
            echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
            return [];
        }
    }
}