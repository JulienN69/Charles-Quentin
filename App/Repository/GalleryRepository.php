<?php

namespace App\Repository;

use PDO;
use App\Db\Mysql;
use PDOException;
use App\Entity\Gallery;
use App\Tools\StringTools;

class GalleryRepository 
{
    public function findOneById(int $id)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        $query = $pdo->prepare('SELECT * FROM gallery WHERE gallery_id = :id');
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
    
        $gallery = $query->fetch($pdo::FETCH_ASSOC);
        return $gallery;
        // if (!$gallery) {
        //     return null;
        // }
    
        // $galleryEntity = new Gallery();
    
        // foreach ($gallery as $key => $value) {
        //     $galleryEntity->{'set'.StringTools::toPascalCase($key)}($value);
        // }
    
        // return $galleryEntity;
    }

    public function findAll()
    {
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();
        $query = $pdo->prepare('SELECT * FROM gallery');
        $query->execute();
        $gallery = $query->fetchAll(PDO::FETCH_ASSOC);

        return $gallery;
    }

    public function createGallery(string $name)
    {
        try {
            $mysql = Mysql::getInstance();
            $pdo = $mysql->getPDO();
            $query = $pdo->prepare('INSERT INTO gallery (name) VALUES (:name)');
            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e) {
            throw new \Exception("création d'une nouvelle galerie échouée", $e->getMessage());
        }
    }

    public function deleteById(int $id)
    {
        $mysql = Mysql::getInstance();
    
        try {
            $pdo = $mysql->getPDO();
            $query = $pdo->prepare('DELETE FROM gallery WHERE gallery_id = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            throw new \Exception("Erreur lors de la suppression de la prestation.", 0, $e);
        }
    }

    public function updateGallery(int $id, string $name)
    {
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        $query = $pdo->prepare('UPDATE gallery SET name = :name WHERE gallery_id = :id');
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

    
}