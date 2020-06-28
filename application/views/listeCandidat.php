<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=" <?= base_url('assets/bootstrap/css/bootstrap.css') ?> ">

    <title>E-Fifidianana - Liste Candidats</title>
</head>
<body style="background: #002B36;">

<?php include "header.php" ?>

    <div class="container" style="color: white;">

        <div style="margin-top: 30px;" class="titre">
            <h1 style="color: white; text-align: center; font-weight: bold">LISTE DES CANDIDATS</h1>

            <h3 style="text-align: center; color: white;">Voici la liste des candidats que vous avez entré :</h3>
        </div>

        <hr style="background: white;">

        <?php $i=1; foreach ($allCandidat as $candidat) { ?>

            <div class="row">

                <div class="image col-sm-2">

                    <h1> <b><?= $candidat->candidatNumero ?></b> </h1>

                </div>

                <div class="image col-sm-4">

                    <img style="width: 70px; height: 70px; margin-left: 25%" src="<?= base_url()?><?= $candidat->candidatPhoto ?>" alt="" srcset="">

                </div>

                <div class="about col-sm-6">

                    <h3><b>Nom : </b><?= $candidat->candidatName ?></h3>

                    <h3><b>Prénom : </b><?= $candidat->candidatFirstName ?></h3>

                </div>

            </div>

            <hr style="background: white;">

        <?php $i++; } ?>

        <div class="row">

            <div class="form-group col-sm-6">
                <small style="color: white;" class="form-text">Cliquez pour ajouter encore de candidat</small>
                <?= anchor("/Fifidianana/index", "Ajouter encore de candidat", ["style"=>"font-weight: bold;", "class"=>"btn btn-success"]) ?>
            </div>

            <div class="form-group col-sm-6">
                <small style="color: white;" class="form-text">Cliquez pour insérer les résultats de vote</small>
                <?= anchor("/Fifidianana/insertVote", "Inserer les résultats de vote", ["style"=>"font-weight: bold;", "class"=>"btn btn-success"]) ?>
            </div>

        </div>

    </div>


<?php include "footer.php" ?>

<script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
    
</body>
</html>