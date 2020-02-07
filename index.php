<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - index.php
 * User : David-Manuel.VAROSO
 * Date : 07.02.2020
 * Time : 11:07
 */

require "controler/controler.php";

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

