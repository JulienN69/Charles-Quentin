<?php
require 'vendor/autoload.php';

// spl_autoload_register();

define('_ROOTPATH_', __DIR__);
define('BASE_URL', 'https://charles-cantin-nesme-f6af6cc1162d.herokuapp.com/');

use App\Controller\Controller;

$controller = new Controller();
$controller->route();