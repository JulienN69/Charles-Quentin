<?php

require_once _ROOTPATH_.'/config.php';
require_once _ROOTPATH_.'/session.php';  


if (!isset($_SESSION['user']) || $_SESSION['user']->getRoles() !== ['admin']) {
    header('Location: admin-forbidden');
    exit;
}

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="https://charles-cantin-nesme-f6af6cc1162d.herokuapp.com/">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Belleza&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nobile:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/sass/css/main.css">
        <title>Charles Quentin</title>
    </head>

<body class="<?= isset($bodyClass) ? $bodyClass : '' ?>">
    <main class="dashboard">
    
        <section class="dashboardMenu <?= isset($menuClass) ? $menuClass : '' ?>">
            <div class="dashboardMenu__home">
                <a href="?controller=admin&action=home" class="dashboardMenu__home--imgLink">
                    <img src="assets/images/icons/accueil.png" alt="image" class="icon">
                </a>
                <a href="admin" class="dashboardMenu__home--link">Dashboard</a>
            </div>
            <div class="dashboardMenu__items">
                <div class="dashboardMenu__items--div">
                    <a href="?controller=admin&action=prestations&subaction=read" class="dashboardMenu__home--imgLink">
                        <img src="assets/images/icons/fichier.png" alt="image" class="icon">
                    </a>
                    <a href="admin-prestations" class="dashboardMenu__home--link">Prestations</a>
                </div>
                <div class="dashboardMenu__items--div">
                    <a href="?controller=admin&action=gallery&subaction=read" class="dashboardMenu__home--imgLink">
                        <img src="assets/images/icons/galerie-dimages.png" alt="image" class="icon">
                    </a>
                    <a href="admin-gallery" class="dashboardMenu__home--link">Galeries</a>
                </div>
                <div class="dashboardMenu__items--div">
                    <a href="#" class="dashboardMenu__home--imgLink">
                        <img src="assets/images/icons/camera.png" alt="image" class="icon">
                    </a>
                    <a href="admin-photos" class="dashboardMenu__home--link">Photos</a>
                </div>
            </div>

        </section>

