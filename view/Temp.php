<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.03.2020
 * Time: 11:49
 */

// le cornona pete les couiles

    $passHash = password_hash(1234, PASSWORD_DEFAULT);
    echo $passHash;

if ($_SESSION['type'] == 1) : ?> Admin ; <?php endif; ?>