<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - userManagement.php
 * User : David-Manuel.VAROSO
 * Date : 07.02.2020
 * Time : 11:28
 */

require_once 'dbConector.php';

// Fonction pour check l'email et le mot de passe a partir de la base de données

function checkLogin($formL){

    $request ="SELECT userEmailAddress, userPsw, pseudo FROM users where userEmailAddress OR pseudo = '".$formL['email']."' AND userPsw = '".$formL['password']."';";

    $queryResult = executeQuery($request);

    if ($queryResult == true){
        $_SESSION['user'] = $formL['email'];
        return true;
    }
    else{
        return false;
    }

}


function checkRegister($formR){

    $request ="INSERT INTO users (userEmailAddress, userPsw, pseudo) VALUES ('".$formR['email']."','".$formR['password']."','".$formR['pseudo']."';";

    $queryResult = executeQuery($request);


    if ($queryResult){
        $_SESSION['user'] = $formR['email'];
        return true;
    }
    else{
        return false;
    }


}