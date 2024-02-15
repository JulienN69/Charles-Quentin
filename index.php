<?php
// require 'vendor/autoload.php';
// require 'App/Controller/Controller.php';
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);

    $rootPath = __DIR__ . '/app/';

    $filePath = $rootPath . $class . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    }
});

echo 'page chargé';

define('_ROOTPATH_', __DIR__);
define('BASE_URL', 'https://charles-cantin-nesme-f6af6cc1162d.herokuapp.com/');

use App\Controller\Controller;

$controller = new Controller();
echo 'Controller chargé';
var_dump($controller) ;
// $controller->route();


// define('BASE_URL', 'http://localhost/charles_cantin');

// spl_autoload_register();