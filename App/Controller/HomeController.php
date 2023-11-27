<?php

namespace App\Controller;

use App\Controller\Controller;

class HomeController extends Controller
{
    public function route ():void 
    {
        if (isset($_GET['action'])){
            switch ($_GET['action']){
                case 'show':
                    $this->about();
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
        $this->render('page/home');
    }
}