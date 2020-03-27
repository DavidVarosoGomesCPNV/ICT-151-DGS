<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 27.03.2020
 * Time: 13:15
 */


$titre = "updateSnowPage";

ob_start();
$rows = 0; // Column count
?>


<?php foreach ($updateSingleSnow as $result) : ?>
    <?php foreach ($tableauAncienCode as $code) : ?>

        <form method="POST" action="index.php?action=updateSnow&code=<?= $code['code'] ?>">


            <label>Code</label>
            <input type="text" name="codeUpdate" value="<?= $result['code'] ?>">

            <label>Brand</label>
            <input type="text" name="brandUpdate" value="<?= $result['brand'] ?>">

            <label>Model</label>
            <input type="text" name="modelUpdate" value="<?= $result['model'] ?>">

            <label>SnowLength</label>
            <input type="number" name="snowLengthUpdate" value="<?= $result['snowLength'] ?>">

            <label>QtyAvailable (max 6) </label>
            <input type="number" name="qtyAvailableUpdate" value="<?= $result['qtyAvailable'] ?>">

            <label>Description</label>
            <input type="text" name="descriptionUpdate" value="<?= $result['description'] ?>">

            <label>DailyPrice</label>
            <input type="number" name="dailyPriceUpdate" value="<?= $result['dailyPrice'] ?>">

            <label>Photo</label>
            <input type="file" name="photoUpdate" value="<?= $result['photo'] ?>">

            <label>Active (soit 1 soit 0)</label>
            <input type="number" name="activeUpdate" value="<?= $result['active'] ?>">

            <input type="submit" name="buttonUpdate" value="Modifier">
            <a href="index.php?action=snowsSeller"><input type="button" value="Annuler"></a>
        </form>
    <?php endforeach ?>
<?php endforeach ?>


<?php
$content = ob_get_clean();
require 'gabarit.php';
?>