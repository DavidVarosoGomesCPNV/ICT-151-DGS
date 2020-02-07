<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - userManagement.php
 * User : David-Manuel.VAROSO
 * Date : 07.02.2020
 * Time : 11:28
 */



function checkLogin($form){

    $request ="SELECT userEmailAddress, userPsw FROM users where userEmailAddress = '".$form['email']."' AND userPsw = '".$form['password']."';";

    require_once 'dbConector.php';

    $queryResult = executeQuery($request);

    if ($queryResult == true){
        $_SESSION['user'] = $form['email'];
        return true;
    }
    else{
        return false;
    }

}