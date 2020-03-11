<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - controler.php
 * User : David-Manuel.VAROSO
 * Date : 07.02.2020
 * Time : 11:07
 */


/**  Ouvre la session, fontion basique de php */

session_start();
// Utilise dans certaines fontions le fichier userManagement du model, notament pour le loginIsCorrect et registerIsCorrect
require "model/userManagement.php";
require "model/snowManagement.php";

/** Redirige l'utilisateur sur la page home */
function home()
{
    $_GET['action'] = "home";
    require "view/home.php";
}

/** Redirige l'utilisateur sur la page home tout en le déconectant avec un session destroy */
function logout(){
    $_SESSION = session_destroy();
    home();
}

/** Fonction pour afficher la page de login */
function login()
{
    $_GET['action'] = "login";
    require "view/login.php";
}

/** Fontion pour vérifier si le login est correct, en utilisant la fonction dans userManagement qui va return un true ou un false ici */
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

/** Fonction pour afficher la page de register */

function register(){
    $_GET['action'] = "register";
    require "view/register.php";
}

/** Fontion pour vérifier si le register est correct, en utilisant la fonction dans userManagement qui va return un true ou un false ici */
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

/** fonction pour afficher la page des snow */

function snow(){
    $tableauSnow = displaySnows();
    require "view/snow.php";

}

function snowsAdmin(){
    $tableauSnow = displaySnows();
    require "view/snowAdmin.php";

}

function displayASnows($code){
    $tableauSnow = displayASnow($code);
    require_once "view/displayASnow.php";
}

