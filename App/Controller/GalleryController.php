<?php

namespace App\Controller;

use App\Entity\Gallery;
use App\Controller\Controller;
use App\Repository\GalleryRepository;
use App\Repository\PhotoRepository;

class GalleryController extends Controller
{
    public function route ():void 
    {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'read':
                    $this->read(); 
                    break;
                case 'contact':

                    break;
                default:

                break;
            }
        } else {
            
        }
    }

    protected function read()
    {
        $photoRepository = new PhotoRepository;
        $photos = $photoRepository->findAllByGalleryId(1);

        $galleryRepository = new GalleryRepository;
        $gallery = $galleryRepository->findAll();
        $this->render('gallery/read', [
            'gallery' => $gallery,
            'photos' => $photos
        ]);

    }
}