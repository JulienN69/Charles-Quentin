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
            }
        } else {
            
        }
    }

    protected function read()
    {
        if (isset($_GET['category'])){
            $galleryId = intval($_GET['category']);
            $photoRepository = new PhotoRepository;
            $photos = $photoRepository->findAllByGalleryId($galleryId);
            header('Content-Type: application/json');
            echo json_encode($photos);
            exit;
        }

        $photoRepository = new PhotoRepository;
        $photos = $photoRepository->findAllByGalleryId(1);

        if (isset($_GET['ajax'])) {
            // Si AJAX, renvoyer également une réponse JSON pour la partie non-AJAX
            header('Content-Type: application/json');
            echo json_encode($photos);
            exit;
        }

        $galleryRepository = new GalleryRepository;
        $gallery = $galleryRepository->findAll();
        $this->render('gallery/read', [
            'gallery' => $gallery,
            'photos' => $photos
        ]);

    }
}