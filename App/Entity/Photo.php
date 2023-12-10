<?php

class Photo 
{
    protected int $photo_id;
    protected string $name;
    protected ?string $size = null;
    protected int $gallery_id;


    /**
     * Get the value of photo_id
     */ 
    public function getPhoto_id()
    {
        return $this->photo_id;
    }

    /**
     * Set the value of photo_id
     *
     * @return  self
     */ 
    public function setPhoto_id($photo_id)
    {
        $this->photo_id = $photo_id;

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

    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
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
}