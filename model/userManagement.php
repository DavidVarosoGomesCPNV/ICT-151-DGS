<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - userManagement.php
 * User : David-Manuel.VAROSO
 * Date : 07.02.2020
 * Time : 11:28
 */

// require_once, a besoin du dbConector pour accéder a la base de données car les fonctions login et register l'utilisent
require 'dbConector.php';

// Fonction pour check l'email et le mot de passe a partir de la base de données d'une personne déjà dedans

function checkLogin($formL)
{

    // Met dans des variables php le contenu des select ou le userEmailAdress et ou le pseudo sont pareils que ce que l'utilisateur rentre dans le input "email"
    // Dans le login le meme input est utilisé pour l'email et le pseudo, on peut rentrer les 2 pour ce connecter mais le nom html est "email"
    $requestLogin = "SELECT userEmailAddress, userPsw, pseudo, type FROM users where userEmailAddress = '" . $formL['email'] . "' OR pseudo ='" . $formL['email'] . "';";
    $requestLogin2 = "SELECT userEmailAddress FROM users WHERE userEmailAddress = '" . $formL['email'] . "' OR pseudo = '" . $formL['email'] . "';";

    // reprend une fonction du dbConector avec en paramètre la variable avec les select au dessus et le met dans une autre variable php
    $queryResult = executeQuery($requestLogin);
    $queryResult2 = executeQuery($requestLogin2);

    if ($queryResult) {
        // Compare le mot de passe hash dans la base et celui rentré par l'utilisateur
        $userHashedPassword = $queryResult[0]["userPsw"];
        if (password_verify($formL['password'], $userHashedPassword)) {
            $_SESSION['email'] = $queryResult2[0]["userEmailAddress"];
            $_SESSION['type'] = $queryResult[0]['type'];
            $_GET['error'] = false;

        return true;
    } else {
        $_GET['error'] = true;
        return false;
    }
}

else {
    $_GET['error'] = true;
    return false;
}

}

// Fonction pour créer un utilisateur avec un mode de passe directement hash dans la base de données a partir de register
function checkRegister($formR)
{

    $requeteCheck = "Select userEmailAddress, pseudo from users where userEmailAddress ='" . $formR['email'] . "' or pseudo = '" . $formR['pseudo'] . "';";
    $queryResult = executeQuery($requeteCheck);

    if ($queryResult) {
        $_GET['errorEmailPseudo'] = true;
        return false;

    } else {
        $_GET['errorEP'] = false;
        if ($formR['password'] == $formR['password2']) {
            $passHash = password_hash($formR['password'], PASSWORD_DEFAULT);
            $requeteCreate = "INSERT INTO users (userEmailAddress, userPsw, pseudo, type) VALUES ('" . $formR['email'] . "','" . $passHash . "','" . $formR['pseudo'] . "','". $formR['type'] . "');";
            executeQuery($requeteCreate);
            $_SESSION['email'] = $formR['email'];
            return true;

        } else {
            return false;

        }
    }
}