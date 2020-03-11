<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - displayASnow.php
 * User : David-Manuel.VAROSO
 * Date : 06.03.2020
 * Time : 12:00
 */
// tampon de flux stocké en mémoire


ob_start();
$rows = 0; // Column count


?>
<?php foreach ($tableauSnow as $result) : ?>
    <?php $rows++; ?>
    <?php if ($rows % 4) : // tests to have 4 items / line ?>
        <div class="row-fluid">
        <ul class="thumbnails">
        <?php $rows = 0; ?>
    <?php endif ?>
<?php endforeach ?>

    <div>
        <table>
            <tr>
                <td>
                    <a href="view/content/images/<?= $result['code']; ?>.jpg" target="blank"><img
                                src="<?= $result['photo']; ?>" alt="<?= $result['code']; ?>"></a></td>
                <div>
            </tr>
            <tr>
                <td href="/index.php?action=displayASnow&code=<?= $result['code']; ?>"><strong>Code : </strong><?= $result['code']; ?></td>
            </tr>
            <tr>
                <td><strong>Marque : </strong><?= $result['brand']; ?></td>
            </tr>
            <tr>
                <td><strong>Model : </strong><?= $result['model']; ?></td>
            </tr>
            <tr>
                <td><strong>Longueur : </strong><?= $result['snowLength']; ?> cm</td>
            </tr>
            <tr>
                <td><strong>Prix : </strong> CHF <?= $result['dailyPrice']; ?>.- / jour</td>
            </tr>
            <tr>
                <td><strong>Disponibilité : </strong><?= $result['qtyAvailable']; ?></td>
            </tr>
        </table>
    </div>


<?php
$content = ob_get_clean();
require 'gabarit.php';
