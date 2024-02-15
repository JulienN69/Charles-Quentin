<?php
// require 'vendor/autoload.php';
require 'App/Controller/Controller.php';

echo 'page chargé';

define('_ROOTPATH_', __DIR__);
define('BASE_URL', 'https://charles-cantin-nesme-f6af6cc1162d.herokuapp.com/');

use App\Controller\Controller;

$controller = new Controller();
echo 'Controller chargé';
$controller->route();


// define('BASE_URL', 'http://localhost/charles_cantin');

// spl_autoload_register();