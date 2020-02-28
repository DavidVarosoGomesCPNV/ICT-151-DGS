<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - snow.php
 * User : David-Manuel.VAROSO
 * Date : 28.02.2020
 * Time : 12:01
 */

// tampon de flux stocké en mémoire
ob_start(); // Ouvre la mémoire tampon , tout ce qui est après ob_start sera dans la variable tampon
$titre = "Rent A Snow - Register";

echo ("Page Snows");

?>















<?php
$contenu = ob_get_clean(); // Libére la mémoire tampon dans une variable $content, donc tout ce qui est entre le ob_open et le ob_get_clean va dans la variable tampon
require "gabarit.php"; // Appele le fichier, il faut que le fichier existe pour que sa fonctionne