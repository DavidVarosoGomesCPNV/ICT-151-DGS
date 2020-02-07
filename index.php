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
        default :
            home();

    }
} else {
    home();
}

