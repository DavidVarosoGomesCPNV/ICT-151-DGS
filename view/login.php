<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - login.php
 * User : David-Manuel.VAROSO
 * Date : 07.02.2020
 * Time : 11:10
 */


// tampon de flux stocké en mémoire
ob_start(); // Ouvre la mémoire tampon , tout ce qui est après ob_start sera dans la variable tampon
$titre = "Rent A Snow - Login";

?>

    <br>
    <br>
    <!-- Mettre ?action en loginIsCorrect poour que il rentre dans la fonction checkLogin, à differentier du simple login() qui ne fait qu'afficher la page-->
    <form action="/index.php?action=loginIsCorrect" method="POST">
        <div class="text">
            <b style="font-size: 35px">Login</b>
        </div>
        <br>
        <?php if (isset($_GET['error'])) : ?>
            <div style="color: red">Rentrez un login valide !</div>
            <br>
        <?php endif ?>

        <div class="container">
            <label for="uname"><b>Email or Pseudo</b></label>
            <label>
                <input type="text" placeholder="Enter Email or Pseudo" name="email" required>
            </label>

            <label for="psw"><b>Password</b></label>
            <label>
                <input type="password" placeholder="Enter Password" name="password" required>
            </label>

            <button type="submit">Login</button>
        </div>

    </form>

    <a href="/index.php?action=login">Reset</a>

<?php


$contenu = ob_get_clean(); // Libére la mémoire tampon dans une variable $content, donc tout ce qui est entre le ob_open et le ob_get_clean va dans la variable tampon
require "gabarit.php"; // Appele le fichier, il faut que le fichier existe pour que sa fonctionne
