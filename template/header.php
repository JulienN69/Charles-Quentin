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
        <title>Charles Cantin</title>
    </head>
    <body>
        <header class="menu">
            <ul>
                <li class="menu__li"><a href="gallery">Galerie</a></li>
                <li class="menu__li"><a href="contact">Contact</a></li>
            </ul>
            <a href="home" class="menu__li">
                <img src="assets\images\logo.jpg" alt="logo" class="menu__li--logo">
            </a>
            <ul>
                <li class="menu__li"><a href="prestations">Tarif et prestations</a></li>
            </ul>

            <div class="menu-hamb" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <div id="menu" class="menu-link">
                <a href="gallery">Galerie</a>
                <a href="contact">Contact</a>
                <a href="prestations">Tarif et prestations</a>
            </div>
        </header>
