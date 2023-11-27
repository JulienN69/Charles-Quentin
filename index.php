<?php

spl_autoload_register();

define('_ROOTPATH_', __DIR__);

use App\Controller\Controller;

$controller = new Controller();
$controller->route();