<?php

namespace App\Repository;

use App\db\Mysql;
use App\Entity\Prestation;
use App\Tools\StringTools;

class PrestationRepository 
{
    public function findOneById(int $id)
    {
        $mysql = Mysql::getInstance();

        $pdo = $mysql->getPDO();
        $query = $pdo->prepare('SELECT * FROM prestation WHERE id = :id');
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $book = $query->fetch($pdo::FETCH_ASSOC);
        $prestationEntity = new Prestation();

        foreach ($book as $key => $value) {
            $prestationEntity->{'set'.StringTools::toPascalCase($key)  }($value);
        }

        return $prestationEntity;
    }
}