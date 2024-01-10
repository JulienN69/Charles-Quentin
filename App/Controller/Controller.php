<?php

namespace App\Controller;

use App\Controller\HomeController;
use App\Controller\AdminController;
use App\Controller\ContactController;
use App\Controller\GalleryController;
use App\Controller\PrestationController;

class Controller 
{
    public function route ():void 
    {
        try {
            if (isset($_GET['controller'])){
                switch ($_GET['controller']){
                    case 'gallery':
                        $galleryController = new GalleryController;
                        $galleryController->route();
                        break;
                    case 'contact':
                        $contactController = new ContactController;
                        $contactController->route();
                        break;
                    case 'home':
                        $homeController = new HomeController;
                        $homeController->route();
                        break;
                    case 'prestation':
                        $prestationController = new PrestationController;
                        $prestationController->route();
                        break;
                    case 'backoffice':
                        $adminController = new AdminController;
                        $adminController->route();
                        break;
                    default:
                        throw new \Exception("le controlleur n'existe pas");
                    break;
                }
            } else {
                $homeController = new HomeController;
                $homeController->home();
            }
        } catch (\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage(),
            ]);
        }
       
    }

    protected function render(string $path, array $params = []):void
    {
        $filePath = _ROOTPATH_.'/template/'.$path.'.php';

        try {
            if (!file_exists($filePath)) {
                throw new \Exception('fichier non trouvé : '.$filePath);
            } else {
                extract($params);
                require_once $filePath;
            }
        } catch(\Exception $e) {
            $this->render('error/default', [
                'error' => $e->getMessage(),
            ]);
        };
    }
}