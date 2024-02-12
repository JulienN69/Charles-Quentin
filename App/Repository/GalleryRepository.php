<?php

namespace App\Repository;

use PDO;
use App\db\Mysql;
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
}