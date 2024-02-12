<?php

namespace App\Controller\Admin;

require_once _ROOTPATH_.'/session.php';

use App\HTML\Form;
use App\Entity\Gallery;
use App\HTML\FormValidator;
use App\Controller\Controller;
use App\Repository\PhotoRepository;
use App\Repository\GalleryRepository;

class AdminGalleryController extends Controller
{
    public function route ():void 
    {
        try {
            if (isset($_GET['subaction'])){
                switch ($_GET['subaction']){
                    case 'read':
                        $this->read();
                        break;
                    case 'update':
                        $this->update();
                        break;
                    case 'delete':
                        $this->delete();
                        break;
                    case 'create':
                        $this->create();
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

    protected function read()
    {
        $galleryRepo = new GalleryRepository;
        $gallery = $galleryRepo->findAll();

        $photosRepo = new PhotoRepository;
        $photos = $photosRepo->findAll();
    
        $this->render('admin/gallery/index', [
            'gallery' => $gallery,
            'photos' => $photos
        ]);
    }

    protected function update()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $galleryRepository = new GalleryRepository;
            $gallery = $galleryRepository->findOneById($id);
            $errors = [];
            $form = new Form($gallery, $errors);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $formValidator = new FormValidator($_POST, $_SESSION);
                $errors = $formValidator->validate();
                var_dump($errors);
            
                if (empty($errors)) {
                    $newName = $_POST['name'];
                    $galleryRepository->updateGallery($id, $newName); 
                    // Redirigez vers la page d'accueil, ou une autre page appropriée après la mise à jour
                    header("Location: admin-gallery");
                    exit();
                }
            }
    
            $this->render('admin/gallery/update', [
                'gallery' => $gallery,
                'form' => $form,
                'errors' => $errors
            ]);
        }    
    }

    protected function create()
    {
        $errors = [];
        $gallery = new Gallery;
        $form = new Form($gallery, $errors);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $formValidator = new FormValidator($_POST, $_SESSION);
            $errors = $formValidator->validate();

            if (empty($errors)) {

                $name = $_POST['name'];

                $galleryRepository = new GalleryRepository;
                $galleryRepository->createGallery($name);
    
                $this->read();
                }
            }       
        
            $this->render('admin/gallery/create', [
                'form' => $form,
            ]);
    }    

    protected function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $galleryRepository = new GalleryRepository;
    
            $galleryRepository->deleteById($id);
        }
    
        $this->read(); 
    }
    
}