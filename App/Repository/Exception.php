<?php

namespace App\Repository;

use Exception;

class NotFoundException extends Exception {

    public function __construct(string $table, int $id)
    {
        $this->message = "aucun enregistrement ne correspont à l'id #$id dans cette table '$table'";
    }

}