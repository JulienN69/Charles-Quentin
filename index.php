<?php
require 'vendor/autoload.php';

// spl_autoload_register();

define('_ROOTPATH_', __DIR__);
define('BASE_URL', 'https://charles-cantin-nesme-f6af6cc1162d.herokuapp.com/');
// define('BASE_URL', 'http://localhost/charles_cantin');

use App\Controller\Controller;

$controller = new Controller();
$controller->route();