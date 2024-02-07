<?php

namespace App\Controller\Admin;

use App\Controller\Controller;
use App\HTML\FileManager;
use App\Repository\PrestationRepository;

class AdminPrestationsController extends Controller
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
        $prestationsRepo = new PrestationRepository;
        $prestations = $prestationsRepo->findAll();

        $this->render('admin/prestations/index', [
            'prestations' => $prestations
        ]);
    }

    protected function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = $_POST['title'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            $fileManager = new FileManager();
    
            try {
                $photo = $fileManager->uploadFile($_FILES['photo']);
            } catch (\Exception $e) {
                echo 'Erreur lors du téléchargement du fichier image : ' . $e->getMessage();
            }
    
            $prestationRepository = new PrestationRepository;
            $prestationRepository->createPrestation($title, $price, $description, $photo);
    
            $this->read();
        } else {
            $this->render('admin/prestations/create');
        }
    }
    

    protected function update()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $prestationRepository = new PrestationRepository;
            $prestation = $prestationRepository->findOneById($id);
    
            $this->render('admin/prestations/update', [
                'prestation' => $prestation
            ]);
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $title = $_POST['title'];
                $price = $_POST['price'];
                $description = $_POST['description'];
    
                $fileManager = new FileManager();
                $fileUploaded = $fileManager->uploadFile($_FILES['photo']);
    
                if ($fileUploaded !== false) { 
                    $photo = $prestation->getPhoto();
                    $fileManager->deleteFile($photo);
                    $updatePrestation = new PrestationRepository;
                    $updatePrestation->updatePrestation($title, $price, $description, $fileUploaded, $id);
                    header("Location: admin-prestations"); 
                } else {
                    $photo = $prestation->getPhoto();
                    $updatePrestation = new PrestationRepository;
                    $updatePrestation->updatePrestation($title, $price, $description, $photo, $id);
                    header("Location: admin-prestations");
                }
            }   
            return;
        }
        $this->read();
        }

        protected function delete()
        {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
        
                $prestationRepository = new PrestationRepository;
                $prestation = $prestationRepository->findOneById($id);
                
                $fileManager = new FileManager();
                try {
                    $fileManager->deleteFile($prestation->getPhoto());
                } catch (\Exception $e) {
                    echo 'Erreur lors de la suppression du fichier : ' . $e->getMessage();
                    return;
                }
        
                $prestationRepository->deleteById($id);
        
                $this->read();
            }
        
            $this->read();
        }
        
    
}