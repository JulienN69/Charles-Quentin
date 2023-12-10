<?php

namespace App\Repository;

use PDO;
use App\db\Mysql;
use App\Entity\Gallery;

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
}