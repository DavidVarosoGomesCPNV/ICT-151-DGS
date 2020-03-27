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

        /* The popup form - hidden by default */
        .formulaireAjouter {
            animation: fadein 5s;
            display: none;
            position: absolute;
            width: 400px;
            height: auto;
            left: 0;
            right: 0;
            margin: auto;
            padding-left: 3px;
            border: solid 1px black;
            color : white;
            background-color: black;
        }
    </style>

        <script>

            function showPopUpAjouter() {
                document.getElementById("myPopupAjouter").style.display = "block";
            }

            function downPopUp() {
                document.getElementById("myPopupAjouter").style.display = "";
            }



        </script>
        <title></title>
    </head>
    <!-- Ajouter-->
    <button onclick="showPopUpAjouter()">Ajouter</button>
    <div class="formulaireAjouter" id="myPopupAjouter">

        <form class="form" method="POST" action="index.php?action=createSnows">

            <label>Code</label>
            <input type="text" name="codeAdd" required>

            <label>Brand</label>
            <input type="text" name="brandAdd" required>

            <label>Model</label>
            <input type="text" name="modelAdd" required>

            <label>SnowLength</label>
            <input type="number" name="snowLengthAdd" required>

            <label>QtyAvailable (max 6) </label>
            <input type="number" name="qtyAvailableAdd" >

            <label>Description</label>
            <input type="text" name="descriptionAdd">

            <label>DailyPrice</label>
            <input type="number" name="dailyPriceAdd" required>

            <label>Photo</label>
            <input type="file" name="photoAdd">

            <label>Active (soit 1 soit 0)</label>
            <input type="number" name="activeAdd">

            <input type="submit" name="bouttonAjouter" value="Ajouter">
            <button onclick="downPopUp()">Annuler</button>
        </form>

    </div>
    <!-- Fin du bouton ajouter-->
    <table>
        <div>
            <article>
                <header>
                    <h2> Nos snows - Admin</h2>
                    <div class="yox-view">
                        <tr>
                            <th><strong>Code</strong></th>
                            <th><strong>Marque</strong></th>
                            <th><strong>Model</strong></th>
                            <th><strong>Longueur</strong></th>
                            <th><strong>Prix </strong> CHF </th>
                            <th><strong>Disponibilité </strong></th>
                            <th><strong>Photo </strong></th>
                            <th><strong>Update </strong></th>
                            <th><strong>Delete </strong></th>
                        </tr>

                        <?php foreach ($tableauSnow as $result) : ?>
                            <?php $rows++; ?>
                            <?php if ($rows % 4) : // tests to have 4 items / line ?>
                                <div class="row-fluid">
                                <ul class="thumbnails">
                                <?php $rows = 0; ?>
                            <?php endif ?>
                            <tr>
                                <td><?= $result['code'];?></td>
                                <td><?= $result['brand']; ?></td>
                                <td><?= $result['model']; ?></td>
                                <td><?= $result['snowLength']; ?> cm</td>
                                <td><?= $result['dailyPrice']; ?>.- / jour</td>
                                <td><?= $result['qtyAvailable']; ?></td>
                                <td><a href="view/content/images/<?= $result['code']; ?>.jpg" target="blank"><img src="<?= $result['photo']; ?>" alt="<?= $result['code']; ?>"></a></td>
                                <th><a href="index.php?action=updateSnowPage&code=<?= $result['code']; ?>"><input type="button" value="Modifier"></a></th>
                                <td><button><a href="/index.php?action=deleteASnow&code=<?=$result['code'];?>">Delete</a></button></td>
                                <?php $result++ ?>
                            </tr>
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
</html>

<?php

$content = ob_get_clean();
require 'gabarit.php';
?>