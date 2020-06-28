<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=" <?= base_url('assets/bootstrap/css/bootstrap.css') ?> ">

    <title>E-Fifidianana - Insertion resultat</title>
</head>
<body style="background: #002B36;">

<?php include "header.php" ?>


    <div class="container">

        <div style="margin-top: 20px;" class="titre">
            <h1 style="color: white; text-align: center; font-weight: bold">INSERTION DES RESULTATS DE VOTE</h1>

            <h3 style="text-align: center; color: white;">Complétez le formulaire pour enregistrer les résultats de vote. Tous les champs sont obligatoires.</h3>
        </div>

        <hr style="background: white;">

        <?php if ($error = $this->session->flashdata('response')): {} ?>

            <div class="alert alert-dismissible alert-success">
                <?= $error; ?>
            </div>

	    <?php endif; ?>

	    <hr style="background: white;">

        <div style="margin-top: 50px; margin-bottom: 94px" class="row">

            <div class="col-sm-4">

                <img style="width: 90%; height: 100%" src="<?= base_url("assets/image/vote.jpg") ?>" alt="" srcset="">

            </div>

            <div class="formulaire col-sm-8">

                <?= form_open('Fifidianana/insertVote', ["class"=>"form-horizontal", "method"=>"POST", "enctype"=>"multipart/form-data"]) ?>

                    <fieldset>

                        <div class="row form-group">
                            <div class="col-sm-8">
                                <label style="color: white; font-weight: bold;">Total Votants :</label>
                            </div>
                            <div class="col-sm-4">
                                <?= form_input(["name"=>"voteTotal", "placeholder"=>"Entrer des nombre des votants", "class"=>"form-control", "value"=>set_value("voteTotal")]); ?>
                                <small class="form-text text-muted"><?= form_error('voteTotal'); ?></small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-8">
                                <label style="color: white; font-weight: bold;">Vote blanc :</label>
                            </div>
                            <div class="col-sm-4">
                                <?= form_input(["name"=>"voteBlanc", "placeholder"=>"Entrer des nombre des votes blanc", "class"=>"form-control", "value"=>set_value("voteBlanc")]); ?>
                                <small class="form-text text-muted"><?= form_error('voteBlanc'); ?></small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-8">
                                <label style="color: white; font-weight: bold;">Vote mort :</label>
                            </div>
                            <div class="col-sm-4">
                                <?= form_input(["name"=>"voteMort", "placeholder"=>"Entrer le nombre des votes mort", "class"=>"form-control", "value"=>set_value("voteMort")]); ?>
                                <small class="form-text text-muted"><?= form_error('voteMort'); ?></small>
                            </div>
                        </div>

                        <?php $i=1; foreach ($allCandidat as $candidat) { ?>

                            <div class="row form-group">
                                <div class="col-sm-8">
                                    <label style="color: white; font-weight: bold;"><?= $candidat->candidatName." ".$candidat->candidatFirstName ?> :</label>
                                </div>
                                <div class="col-sm-4">
                                    <?= form_input(["name"=>$i, "placeholder"=>"Entrer le nombre des votes pour $candidat->candidatName", "class"=>"form-control", "value"=>set_value("voteMort")]); ?>
                                    <small class="form-text text-muted"><?= form_error('$i'); ?></small>
                                </div>
                            </div>

                        <?php $i++; } ?>

                        <br>

                        <div class="row">

                            <div class="form-group col-sm-6">
                                <small style="color: white;" class="form-text">Cliquez pour voir le gagnant</small>
                                <?= form_submit(["value"=>"Voir le gagnant", "style"=>"font-weight: bold;","class"=>"btn btn-primary"]); ?>
                            </div>

                            <div class="form-group col-sm-6">
                                <small style="color: white;" class="form-text">Cliquez pour voir la liste des candidats</small>
                                <?= anchor("/Fifidianana/showWinner", "Voir le résultat", ["style"=>"font-weight: bold;", "class"=>"btn btn-success"]) ?>
                            </div>

                        </div>

                    </fieldset>

                <?= form_close() ?>

            </div>
        </div>

    </div>


<?php include "footer.php" ?>

<script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
    
</body>
</html>