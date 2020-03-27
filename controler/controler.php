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
    } else {
        login();
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
    } else {
        register();
    }

}

/** fonction pour afficher la page des snow */

function snow(){
    $tableauSnow = displaySnows();
    require "view/snow.php";

}

/** fonction pour afficher la page des snow admin / vendeur */
function snowsAdmin(){
    $tableauSnow = displaySnows();
    require "view/snowAdmin.php";

}

/** fonction pour afficher la page d'un seul snow par rapport a son code */
function displayASnows($code){
    $tableauSnow = displayASnow($code);
    require_once "view/displayASnow.php";
}

/** fonction pour delete un snow par rapport a son code */
function deleteASnow(){

    // echo "<script>window.alert('Test')</script>";
    $tableauSnow = displaySnows();
    deleteSnow();
    echo "<script>window.alert('Snow supprimé !')</script>";
    // Update la page (non opérationel)
    snowsAdmin();

}


/** fonction pour create un snow, vérifi si le code n'exite pas déja avant d'ajouter si c'est le cas renvoie une alerte a l'utilisateur */
function createSnows($postFormulaire)
{
    /** Récupere l'action de l'index */

    $_GET['action'] = "createSnows";

    /** Met tout dans des varibales */

    $Code = $postFormulaire["codeAdd"];
    $Brand = $postFormulaire["brandAdd"];
    $Model = $postFormulaire["modelAdd"];
    $SnowLength = $postFormulaire["snowLengthAdd"];
    $QtyAvailable = $postFormulaire["qtyAvailableAdd"];
    $Description = $postFormulaire["descriptionAdd"];
    $DailyPrice = $postFormulaire["dailyPriceAdd"];
    $Photo = $postFormulaire["photoAdd"];
    $Active = $postFormulaire["activeAdd"];

    /** $codeVerifier récup le code pour vérifier dans le if en bas */
    $codeVerifier = showSingleCode($postFormulaire['codeAdd']);
    // Tjrs mettre [0] mais avec $codeMETTRE [0]) MAIS AVEC $codeVerifier (exemple : $codeVerifier[0]['code'], etc...)

    /** Vérifie avec les 2 c odes si ils sont similaires renvoie une alerte "Vous avez ajouter un snow avec un code..." si non renvoie une alerte positive */
    if (isset($Code)) {

        if ($Code != @$codeVerifier[0]['code']) {
            createSnow($Code, $Brand, $Model, $SnowLength ,$QtyAvailable,$Description,$DailyPrice,$Photo,$Active);
            echo "<script>window.alert('Snow ajouté avec succés')</script>";
        } else {
            echo "<script>window.alert('Vous avez ajouter un snow avec un code déjà existant !')</script>";
        }

    } else {
        echo "erreur dans l'ajout";
    }

    /** Ré-affiche la page Admin */
    snowsAdmin();

}


/** Redirige vers la page updateSnowPage.php */
function updateSnowPage($code)
{

    $_GET['action'] = "updateSnowPage";

    //$updateSingleSnow contiendra toutes les infos d'un snow par rapport a son code
    $updateSingleSnow = detailSingleSnow($code);

    //$tableauAncienCode contiendra juste un code sous forme de tableau (un foreache sera obligatoir pour l'utiliser)
    $tableauAncienCode=showSingleCode($code);

    require "view/updateSnowPage.php";

}




/** Redirige vers la fonction qui modifire  un snow uniquement si il n'exite pas */
function updateSnow($detailSnow,$code)
{
    $_GET['action'] = "updateSnow";

    $Code = $detailSnow["codeUpdate"];
    $Brand = $detailSnow["brandUpdate"];
    $Model = $detailSnow["modelUpdate"];
    $SnowLength = $detailSnow["snowLengthUpdate"];
    $QtyAvailable = $detailSnow["qtyAvailableUpdate"];
    $Description = $detailSnow["descriptionUpdate"];
    $DailyPrice = $detailSnow["dailyPriceUpdate"];
    $Photo = $detailSnow["photoUpdate"];
    $Active = $detailSnow["activeUpdate"];

    $codeVerifier = showSingleCode($detailSnow['codeUpdate']);//A SAVOIR QUE TU DEVRA SPESIFIER QUEL CHAMPS DE LA BD ET QUEL LIGNE (TJR METTRE [0]) MAIS AVEC $codeVerifier (exemple : $codeVerifier[0]['code'], etc...)


    if (isset($Code)) {
        if ($Code != @$codeVerifier[0]['code'] || $Code==$code) {
            updateSnowBD($Code, $Brand, $Model, $SnowLength ,$QtyAvailable,$Description,$DailyPrice,$Photo,$Active,$code);
            echo "<script>window.alert('Snow modifié avec succées')</script>";
        } else {
            echo "<script>window.alert('Ce code est deja pris, veillez en choisir un autre')</script>";
        }

    } else {
        echo "<script>window.alert('Erreur dans la modification')</script>";
    }

    /** Ré-affiche la page Admin */
    snowsAdmin();

}
