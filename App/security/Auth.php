<?php

namespace App\security;

interface Auth {

/**
 * @return User|null
 */
public function getUser(): ?User ;



    
}