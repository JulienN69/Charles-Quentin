<?php
require_once _ROOTPATH_.'/config.php';
require_once _ROOTPATH_.'/session.php';  
require_once _ROOTPATH_.'/template/admin/index.php';

// Vérifiez si l'utilisateur est connecté et a le rôle admin
if (!isset($_SESSION['user']) || $_SESSION['user']->getRoles() !== ['admin']) {
    // Redirigez vers la page de connexion
    header('Location: ?controller=admin&action=login&forbidden=1');
    exit;
}
?>

<section class="dashboardContent">
    <h2 class="dashboardContent__title">Bienvenue Charles Cantin</h2>
    <a class="dashboardContent__link" type="button" href="?controller=home&action=home">retour au site</a>
    <form action="?controller=admin&action=logout" method="post">
        <button class="dashboardContent__button" type="submit">se déconnecter</button>
    </form>
</section>

</main>
</body> 