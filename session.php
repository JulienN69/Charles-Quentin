<?php

session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'httponly' => true
]);

session_start();

if (!isset($_SESSION['csrf_token'])) {

    $csrfToken = bin2hex(random_bytes(32));

    $_SESSION['csrf_token'] = $csrfToken;
}

function adminOnly() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
        // Rediriger vers la page de connexion
        header("Location: ../login.php");
        exit();
    }
}