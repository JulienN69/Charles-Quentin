<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Repository\GalleryRepository;

class AdminController extends Controller
{
    public function route ():void 
    {
    try {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'login':
                    $this->login();
                    break;
                case 'index':
                    $this->index();
                    break;
                default:
                    throw new \Exception("cette action n'existe pas :".$_GET['action']);
                break;
            }
        } else {
            throw new \Exception("aucune action n'est détectée");
        }
    } catch (\Exception $e) {
        $this->render('error/default', [
            'error' => $e->getMessage(),
        ]);
    }
   
        
    }

    protected function login()
    {
        $this->render('admin/login');
    }
    protected function index()
    {
        $galleryRepo = new GalleryRepository;
        $gallery = $galleryRepo->findAll();

        $this->render('admin/index', [
            'gallery' => $gallery
        ]);
    }
}