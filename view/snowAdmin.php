<?php
/**
 * Created By PhpStrom.
 * Title : ICT-151-DGS - snowAdmin.php
 * User : David-Manuel.VAROSO
 * Date : 11.03.2020
 * Time : 15:30
 */

// tampon de flux stocké en mémoire
$title = "RentASnow - Snows";

ob_start();
$rows = 0; // Column count

?>
<html lang="fr">
    <head>
    <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }
    </style>
        <title></title>
    </head>
    <table>
        <div>
            <article>
                <header>
                    <h2> Nos snows - Admin</h2>
                    <div class="yox-view">

                        <?php foreach ($tableauSnow as $result) : ?>
                            <?php $rows++; ?>
                            <?php if ($rows % 4) : // tests to have 4 items / line ?>
                                <div class="row-fluid">
                                <ul class="thumbnails">
                                <?php $rows = 0; ?>
                            <?php endif ?>

                            <li class="span3">
                                <div class="thumbnail">
                                    <a href="view/content/images/<?= $result['code']; ?>.jpg" target="blank"><img
                                            src="<?= $result['photo']; ?>" alt="<?= $result['code']; ?>"></a>
                                    <div class="caption">
                                        <h3>
                                            <a href="/index.php?action=displayASnow&code=<?=$result['code']; ?>"><?= $result['code'];?></a>
                                        </h3>
                                        <p><strong>Marque : </strong><?= $result['brand']; ?></p>
                                        <p><strong>Model : </strong><?= $result['model']; ?></p>
                                        <p><strong>Longueur : </strong><?= $result['snowLength']; ?> cm</p>
                                        <p><strong>Prix :</strong> CHF <?= $result['dailyPrice']; ?>.- / jour</p>
                                        <p><strong>Disponibilité: </strong><?= $result['qtyAvailable']; ?></p>
                                    </div>
                                </div>
                            </li>

                            <?php if ($rows % 4) : ?>
                                </ul>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>

                    </div>
                </header>
            </article>
            <hr/>
        </div>
    </table>

    <table>
        <tr>
            <th><strong>Marque : </strong></th>
            <th><strong>Model : </strong></th>
            <th><strong>Longueur : </strong></th>
            <th><strong>Prix :</strong> CHF </th>
            <th><strong>Disponibilité: </strong></th>
        </tr>
        <tr>
            <td><?= $result['brand']; ?></td>
            <td><?= $result['model']; ?></td>
            <td><?= $result['snowLength']; ?> cm</td>
            <td><?= $result['dailyPrice']; ?>.- / jour</td>
            <td><?= $result['qtyAvailable']; ?></td>
            <td><a href="view/content/images/<?= $result['code']; ?>.png" target="blank"><img
                            src="<?= $result['photo']; ?>" alt="<?= $result['code']; ?>"></a></td>
        </tr>
        <tr>
            <td>X</td>
            <td>Griffin</td>
            <td>$150</td>
        </tr>
        <tr>
            <td>Joe</td>
            <td>Swanson</td>
            <td>$300</td>
        </tr>
        <tr>
            <td>Cleveland</td>
            <td>Brown</td>
            <td>$250</td>
        </tr>
    </table>

</html>

<?php
$content = ob_get_clean();
require 'gabarit.php';
?>