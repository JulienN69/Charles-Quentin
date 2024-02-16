<?php

namespace App\Entity;

class Gallery 
{
    protected ?int $gallery_id;
    protected ?string $name;

    public function __construct($gallery_id = null, $name = null)
    {
        $this->name = $name;
        $this->gallery_id = $gallery_id;
    }
    

    /**
     * Get the value of gallery_id
     */ 
    public function getGallery_id()
    {
        return $this->gallery_id;
    }

    /**
     * Set the value of gallery_id
     *
     * @return  self
     */ 
    public function setGallery_id($gallery_id)
    {
        $this->gallery_id = $gallery_id;

        return $this; 
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}