<?php

namespace App\Controller;

use App\Controller\Controller;

class PrestationController extends Controller
{
    public function route ():void 
    {
    try {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'show':
                    $this->show();
                    break;
                case 'delete':
                    
                    break;
                case 'update':
                    
                    break;
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
        $this->render('prestation/read');
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