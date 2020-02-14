<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - register.php
 * User : David-Manuel.VAROSO
 * Date : 14.02.2020
 * Time : 11:27
 */

// tampon de flux stocké en mémoire
ob_start(); // Ouvre la mémoire tampon , tout ce qui est après ob_start sera dans la variable tampon
$titre = "Rent A Snow - Register";

?>

    <br>
    <br>
    <!-- Mettre ?action en loginIsCorrect poour que il rentre dans la fonction checkLogin, à differentier du simple login() qui ne fait qu'afficher la page-->
    <form action="/index.php?action=registerIsCorrect" method="POST">
        <div class="text">
            <b style="font-size: 35px">Register</b>
        </div>
        <br>

        <div class="container">
            <label for="uname"><b>Email</b></label>
            <label>
                <input type="text" placeholder="Enter Email Adress" name="email" required>
            </label>

            <label for="psw"><b>Password</b></label>
            <label>
                <input type="password" placeholder="Enter Password" name="password" required>
            </label>

            <label for="uname"><b>Pseudo</b></label>
            <label>
                <input type="text" placeholder="Enter Pseudo" name="pseudo" required>
            </label>

            <button type="submit">Register</button>
            <button type="submit">Reset</button>
        </div>


    </form>


<?php
$contenu = ob_get_clean(); // Libére la mémoire tampon dans une variable $content, donc tout ce qui est entre le ob_open et le ob_get_clean va dans la variable tampon
require "gabarit.php"; // Appele le fichier, il faut que le fichier existe pour que sa fonctionne
