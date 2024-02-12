<?php

namespace App\Controller\Admin;

use App\HTML\Form;
use App\Entity\Gallery;
use App\HTML\FileManager;
use App\HTML\FormValidator;
use App\Controller\Controller;
use App\Repository\PhotoRepository;
use App\Repository\GalleryRepository;

class AdminPhotoController extends Controller
{
    public function route ():void 
    {
    try {
        if (isset($_GET['subaction'])){
            switch ($_GET['subaction']){
                case 'read':
                    $this->read();
                    break;
                // case 'update':
                //     $this->update();
                //     break;
                case 'delete':
                    $this->delete();
                    break;
                // case 'create':
                //     $this->create();
                //     break;
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
        $errors = [];
    
        $galleryRepo = new GalleryRepository;
        $gallery = $galleryRepo->findAll();
    
        $photosRepo = new PhotoRepository;
        $photos = $photosRepo->findAll();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $galleryId = $_POST['gallery_id'];
            $galleryName = $_POST['gallery_name'];
    
            $fileManager = new FileManager();
            $fileUploadResult = $fileManager->uploadFile($_FILES['photo'], $galleryName);
    
            if (is_array($fileUploadResult)) {
                $errors['photo'] = implode('<br>', $fileUploadResult);
            } else if ($fileUploadResult === false) {
                $errors['photo'] = 'Erreur lors du téléchargement du fichier image.';
            }
            var_dump($errors);
            if (empty($errors)) {
                $photo = $fileUploadResult; 
    
                $photoRepository = new PhotoRepository;
                $photoRepository->createPhotoByGallery($photo, $galleryId);
    
                header('Location: admin-photos');
                exit(); 
            }
        }
    
        $this->render('admin/photos/index', [
            'gallery' => $gallery,
            'photos' => $photos,
            'errors' => $errors
        ]);
    }
    
    
    protected function delete()
        {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $photoRepository = new PhotoRepository;

                $photoId = $photoRepository->findOneById($id);
                $galleryId = $photoId['gallery_id'];

                $photoRepository->deleteById($id);

                $galleryRepo = new GalleryRepository;
                $gallery = $galleryRepo->findOneById($galleryId);

                $fileRepository = new FileManager;
                $fileRepository->deleteFile($gallery['name']. '/' . $photoId['name']);
        
                $this->read();
            }        
            $this->read();
        }

}