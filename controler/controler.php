<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - controler.php
 * User : David-Manuel.VAROSO
 * Date : 07.02.2020
 * Time : 11:07
 */


/**
 * Open the session, basic php function
 */

session_start();

require "model/userManagement.php";

/** Function to redirect the user to the home page */
function home()
{
    $_GET['action'] = "home";
    require "view/home.php";
}

function logout(){
    $_SESSION = session_destroy();
    home();
}

function login()
{
    $_GET['action'] = "login";
    require "view/login.php";
}


function loginIsCorrect($formL)
{
    if (checkLogin($formL)) {
        home();
        echo "home";
    } else {
        login();
        echo "login";
    }
}



function register(){
    $_GET['action'] = "register";
    require "view/register.php";
}


function registerIsCorrect($formR)
{
    if (checkRegister($formR)) {
        home();
        echo "home";
    } else {
        register();
        echo "register";
    }

}