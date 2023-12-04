<?php

namespace App\Controller;

use App\Controller\Controller;

class GaleryController extends Controller
{
    public function route ():void 
    {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'read':
                    $this->read(); 
                    break;
                case 'contact':

                    break;
                default:

                break;
            }
        } else {
            
        }
    }

    protected function read()
    {
        $this->render('galery/read');
    }
}