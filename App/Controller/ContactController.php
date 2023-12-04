<?php

namespace App\Controller;

use App\Controller\Controller;

class ContactController extends Controller
{
    public function route ():void 
    {
    try {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'contact':
                    $this->contact();
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

    protected function contact()
    {
        $this->render('contact/contact');
    }
}