<?php

session_start();

spl_autoload_register(function ($class) {
    require_once lcfirst(str_replace('\\', '/', $class)) . '.php';
});

if(array_key_exists('route', $_GET)):

    switch($_GET['route']) {

        /* PAGE D'ACCUEIL : AFFICHE LE FORMULAIRE */
        case 'home':
            $controller = new Controllers\HomeController();
            $controller->display();
        break;

        /* PAGE DES MEMBRES : AFFICHE TOUS LES UTILISATEURS */
        case 'addMember':
            $controller = new Controllers\MemberController();
            $controller->verifAddMember();
        break;

        /* SI Y'A PAS DE ROUTE REDIRIGE VERS L'ACCUEIL DU SITE */
        default:
            header('location: index.php?route=home');
            exit;
    }
else :
    header('Location: index.php?route=home');
    exit;
endif;