<?php

namespace App\Repository;

use PDO;
use Photo;
use Exception;
use App\db\Mysql;
use PDOException;
use App\Tools\StringTools;

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

    public function deleteById(int $id)
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
            
            $query = $pdo->prepare('DELETE FROM photo WHERE photo_id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            
            $query->execute();

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            throw new \Exception("Erreur lors de la suppression de la photo.", 0, $e);

        }
    }

    public function findOneById(int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        $query = $pdo->prepare('SELECT * FROM photo WHERE photo_id = :id');
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
    
        $photo = $query->fetch($pdo::FETCH_ASSOC);
        return $photo;
        // var_dump($photo);
        // if (!$photo) {
        //     return null;
        // }
    
        // $photoEntity = new Photo();
        // foreach ($photo as $key => $value) {
        //     $photoEntity->{'set'.StringTools::toPascalCase($key)}($value);
        // }
        // return $photoEntity;
    }
    

    public function createPhotoByGallery(string $photo, int $gallery_id)
    {
        $mysql = Mysql::getInstance();

        $pdo= $mysql->getPDO();
        $query = $pdo->prepare('INSERT INTO photo (name, gallery_id) VALUE (:name, :gallery_id)');
        $query->bindValue(':gallery_id', $gallery_id, $pdo::PARAM_INT);
        $query->bindValue(':name', $photo, $pdo::PARAM_STR);
        $query->execute();

    }
}