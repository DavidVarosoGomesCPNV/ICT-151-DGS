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


