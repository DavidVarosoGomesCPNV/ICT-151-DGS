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


/** Affichee un snow avec ces détails */
function detailSingleSnow($code)
{

    $requete = "SELECT * FROM snows where code ='$code';";
    $request = executeQuery($requete);


    return $request;
}

/** Cherchee tout les code de chaque article */

function showSingleCode($code)
{

    $requete = "SELECT code FROM snows WHERE code='$code';";
    $request = executeQuery($requete);
    return $request;
}

/** Modifie un snow dans la base de données*/
function updateSnowBD($code,$brand,$model,$snowLength,$qtyAvailable,$description,$dailyPrice,$photo,$active,$codePrecedent){

    $requete ="UPDATE snows SET code = '$code',brand = '$brand',model = '$model',snowLength = '$snowLength',qtyAvailable = '$qtyAvailable',description = '$description',dailyPrice = '$dailyPrice',photo = '$photo',active = '$active' WHERE code = '$codePrecedent';";

    $request = executeQuery($requete);
    return $request;
}

/** Crée un snow dans la base de données*/
function createSnow($code,$brand,$model,$snowLength,$qtyAvailable,$description,$dailyPrice,$photo,$active){

    $requete ="INSERT INTO snows (code, brand, model, snowLength,qtyAvailable,description,dailyPrice,photo,active) VALUES ('$code','$brand','$model','$snowLength','$qtyAvailable','$description','$dailyPrice','$photo','$active');";

    $request = executeQuery($requete);
    return $request;
}




