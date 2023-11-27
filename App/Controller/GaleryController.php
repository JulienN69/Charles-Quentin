<?php

namespace App\GaleryController;

use App\Controller\Controller;

class GaleryController extends Controller
{
    public function route ():void 
    {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'show':

                    break;
                case 'contact':

                    break;
                default:

                break;
            }
        } else {
            
        }
    }

    protected function about()
    {
        $this->render('page/about');
    }
}