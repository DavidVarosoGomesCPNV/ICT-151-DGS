<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - index.php
 * User : David-Manuel.VAROSO
 * Date : 07.02.2020
 * Time : 11:07
 */
// Require controleur
require "controler/controler.php";

// Switch avec toutes les actions possibles de faire dans le site

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case 'login' :
            login();
            break;
        case'loginIsCorrect';
            loginIsCorrect($_POST);
            break;
        case 'logout':
            logout();
            break;
        case 'register':
            register();
            break;
        case 'registerIsCorrect':
            registerIsCorrect($_POST);
            break;
        case 'snow';
            snow();
            break;
        case 'displayASnow';
            displayASnows($_GET['code']);
            break;
        case 'snowAdmin';
            snowsAdmin();
            break;
        case'deleteASnow';
            deleteASnow();
            break;
        case 'createSnows':
            createSnows($_POST);
            break;
        case 'updateSnowPage':
            updateSnowPage($_GET['code']);
            break;
        case 'updateSnow':
            updateSnow($_POST, $_GET['code']);
            break;


        default :
            home();

    }
} else {
    home();
}

