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

    $requestLogin ="SELECT userEmailAddress, userPsw, pseudo FROM users where userEmailAddress = '" . $formL['email']. "' OR pseudo ='" .$formL['email']. "';";
    $requestLogin2 ="SELECT userEmailAddress FROM users WHERE userEmailAddress = '" . $formL['email'] . "' OR pseudo = '" . $formL['email'] . "';";


    $queryResult = executeQuery($requestLogin);
    $queryResult2 = executeQuery($requestLogin2);

    if ($queryResult) {
        $userHashedPassword = $queryResult[0]["userPsw"];
        if (password_verify($formL['password'], $userHashedPassword)) {
            $_SESSION['email'] = $queryResult2[0]["userEmailAddress"];
            $_GET['error'] = false;
            return true;
        } else {
            $_GET['error'] = true;
            return false;
        }
    }else{
        $_GET['error'] = true;
        return false;
    }
}


function checkRegister($formR)
{

    $requeteCheck = "Select userEmailAddress, pseudo from users where userEmailAddress ='" . $formR['email'] . "' or pseudo = '" . $formR['pseudo'] . "';";
    $queryResult = executeQuery($requeteCheck);

    if ($queryResult) {
        $_GET['errorEP'] = true;
        return false;
    } else {
        $_GET['errorEP'] = false;
        if ($formR['password'] == $formR['password2']) {
            $passHash = password_hash($formR['password'], PASSWORD_DEFAULT);
            $requeteCreate = "INSERT INTO users (userEmailAddress, userPsw, pseudo) VALUES ('" . $formR['email'] . "','" . $passHash . "','" . $formR['pseudo'] . "');";
            executeQuery($requeteCreate);

            $_SESSION['email'] = $formR['email'];
            $_GET['errorPass'] = false;
            return true;
        } else {
            $_GET['errorPass'] = true;
            return false;
        }
    }
}

