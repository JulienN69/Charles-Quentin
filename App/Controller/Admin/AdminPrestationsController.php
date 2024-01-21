<?php

namespace App\Controller\Admin;

use App\Controller\Controller;
use App\Entity\Prestation;
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
                // case 'delete':
                //     $this->delete();
                //     break;
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
            // Récupérer les données du formulaire
            $title = $_POST['title'];
            $price = $_POST['price'];
            $description = $_POST['description'];

            // Appeler la méthode du modèle pour créer la prestation
            // $this->prestationModel->createPrestation($title, $price, $description);

            // Rediriger ou afficher un message de succès, selon vos besoins
            // ...
        } else {
            // Afficher le formulaire de création
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

            return;
        }
    
        $this->render('admin/prestations/update');
    }
    
}