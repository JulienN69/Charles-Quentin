<?php

namespace App\Controller\Admin;

require_once _ROOTPATH_.'/session.php';

use App\HTML\FileManager;
use App\HTML\FormValidator;
use App\Controller\Controller;
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
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $formValidator = new FormValidator($_POST, $_SESSION);
            $errors = $formValidator->validate();

            if (empty($errors)) {

                $title = $_POST['title'];
                $price = $_POST['price'];
                $description = $_POST['description'];

                $fileManager = new FileManager();

                $fileUploadResult = $fileManager->uploadFile($_FILES['photo']);

                if (is_array($fileUploadResult)) {
 
                    $errors['photo'] = implode('<br>', $fileUploadResult);
                } else if ($fileUploadResult === false) {                   
                    $errors['photo'] = 'Erreur lors du téléchargement du fichier image.';
                }
        
                if (empty($errors)) {
                    $title = $_POST['title'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $photo = $fileUploadResult; 
        
                    $prestationRepository = new PrestationRepository;
                    $prestationRepository->createPrestation($title, $price, $description, $photo);
        
                    $this->read();
                }
            }       
            $this->render('admin/prestations/create', ['errors' => $errors]);
        } 
        $this->render('admin/prestations/create', ['errors' => $errors]);
    }


    protected function update()
    {
        $errors = [];
    
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $prestationRepository = new PrestationRepository;
            $prestation = $prestationRepository->findOneById($id);
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $formValidator = new FormValidator($_POST, $_SESSION);
                $errors = $formValidator->validate();
    
                // Vérifier si un fichier a été téléchargé
                if (!empty($_FILES['photo']['name'])) {
                    $fileManager = new FileManager();
                    $fileUploadResult = $fileManager->uploadFile($_FILES['photo']);
    
                    if (is_array($fileUploadResult)) {
                        $errors['photo'] = implode('<br>', $fileUploadResult);
                    } else if ($fileUploadResult === false) {
                        $errors['photo'] = 'Erreur lors du téléchargement du fichier image.';
                    } else {
                        // Mise à jour de la photo seulement si un nouveau fichier a été téléchargé
                        $photo = $fileUploadResult;
                    }
                } else {
                    // Aucun fichier téléchargé, garder la photo actuelle
                    $photo = $prestation->getPhoto();
                }
    
                if (empty($errors)) {
                    $title = $_POST['title'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
    
                    // Mettre à jour la prestation
                    $prestationRepository->updatePrestation($title, $price, $description, $photo, $id);
    
                    // Redirection après la mise à jour
                    header('Location: admin-prestations');
                    exit;
                }
            }
    
            // Afficher le formulaire de mise à jour avec les erreurs éventuelles
            $this->render('admin/prestations/update', [
                'prestation' => $prestation,
                'errors' => $errors
            ]);
        }
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