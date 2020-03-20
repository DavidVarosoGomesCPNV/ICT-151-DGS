<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - snowManagement.php
 * User : David-Manuel.VAROSO
 * Date : 28.02.2020
 * Time : 12:04
 */



function displaySnows()
{

    $requestReadSnow = "SELECT code, brand, model, snowLength, qtyAvailable, description, dailyPrice, photo, active FROM snows";
    $queryResult = executeQuery($requestReadSnow);

    return $queryResult;
}


function displayASnow($code)
{


    $requestReadSnow = "SELECT code, brand, model, snowLength, qtyAvailable, description, dailyPrice, photo, active FROM snows WHERE code ='".$code."';";
    $queryResult = executeQuery($requestReadSnow);

    return $queryResult;

}

function deleteSnow()
{
    $requestDeleteSnow = "DELETE FROM snows WHERE code ='".$_GET['code']."';";
    $queryResult = executeQuery($requestDeleteSnow);
    return $queryResult;

}


function updateASnow($code)
{

    $requestDeleteSnow = "DELETE FROM snows WHERE code =' $code ';";
    $queryResult = executeQuery($requestDeleteSnow);

    return $queryResult;

}