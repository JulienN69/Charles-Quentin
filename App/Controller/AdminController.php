<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Controller\Admin\AdminPrestationsController;
use App\Repository\GalleryRepository;
use App\Repository\PrestationRepository;

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
                case 'home':
                    $this->home();
                    break;
                case 'gallery':
                    $this->gallery();
                    break;
                case 'prestations':
                    $AdminPrestationsController = new AdminPrestationsController;
                    $AdminPrestationsController->route();
                    break;
                default:
                    throw new \Exception("cette action n'existe pas :".$_GET['action']);
                break;
            }
        } else {
            // throw new \Exception("aucune action n'est détectée");
            $this->login();
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

    protected function home()
    {
        $galleryRepo = new GalleryRepository;
        $gallery = $galleryRepo->findAll();

        $this->render('admin/home', [
            'gallery' => $gallery
        ]);
    }

    protected function gallery()
    {
        $galleryRepo = new GalleryRepository;
        $gallery = $galleryRepo->findAll();

        $this->render('admin/gallery/index', [
            'gallery' => $gallery
        ]);
    }

    protected function prestations()
    {
        $prestationsRepo = new PrestationRepository;
        $prestations = $prestationsRepo->findAll();

        $this->render('admin/prestations/index', [
            'prestations' => $prestations
        ]);
    }
}