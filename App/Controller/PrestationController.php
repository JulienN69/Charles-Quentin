<?php

namespace App\Controller;

use App\Controller\Controller;
use App\db\Mysql;
use App\Repository\PrestationRepository;

class PrestationController extends Controller
{
    public function route ():void 
    {
    try {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'show':
                    $this->show();
                case 'read':
                    $this->read();
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

    protected function read()
    {
        $prestationsRepository = new PrestationRepository;
        $prestations = $prestationsRepository->findAll();
        $this->render('prestation/read', [
            'prestations' => $prestations
        ]);
    }

    protected function show()
    {
        try {
            if (isset($_GET['id'])){
                $id = (int)$_GET['id'];
            } else {
                throw new \Exception("il n'y a pas d'id");
            }
        } catch (\Exception $e) {

        }
        $this->render('prestation/show');
    }
}