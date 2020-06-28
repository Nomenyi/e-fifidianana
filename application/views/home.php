<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=" <?= base_url('assets/bootstrap/css/bootstrap.css') ?> ">

    <title>E-Fifidianana</title>
</head>
<body style="background: #002B36;">

<?php include "header.php" ?>


    <div class="container">

        <div style="margin-top: 53px;" class="titre">
            <h1 style="color: white; text-align: center; font-weight: bold">INSERTION DE CANDIDAT</h1>

            <h3 style="text-align: center; color: white;">Complétez le formulaire pour enregistrer un candidat. Tous les champs sont obligatoires.</h3>
        </div>

        <hr style="background: white;">

        <?php if ($error = $this->session->flashdata('response')): {} ?>

            <div class="alert alert-dismissible alert-success">
                <?= $error; ?>
            </div>

	    <?php endif; ?>

	    <hr style="background: white;">

        <div style="margin-top: 50px; margin-bottom: 94px" class="row">

            <div class="col-sm-6">

                <img style="width: 90%; height: 100%" src="<?= base_url("assets/image/vote.jpg") ?>" alt="" srcset="">

            </div>

            <div class="formulaire col-sm-6">

                <?= form_open('Fifidianana/saveCandidat', ["class"=>"form-horizontal", "method"=>"POST", "enctype"=>"multipart/form-data"]) ?>

                    <fieldset>

                        <div class="form-group">
                            <label style="color: white; font-weight: bold;">Numéro du candidat :</label>
                            <?= form_input(["name"=>"candidatNumero", "placeholder"=>"Entrer numéro du candidat", "class"=>"form-control", "value"=>set_value("candidatNumero")]); ?>
                            <small class="form-text text-muted"><?= form_error('candidatNumero'); ?></small>
                        </div>

                        <div class="form-group">
                            <label style="color: white; font-weight: bold;">Nom du candidat :</label>
                            <?= form_input(["name"=>"candidatName", "placeholder"=>"Entrer nom du candidat", "class"=>"form-control", "value"=>set_value("candidatName")]); ?>
                            <small class="form-text text-muted"><?= form_error('candidatName'); ?></small>
                        </div>

                        <div class="form-group">
                            <label style="color: white; font-weight: bold;">Prénom du candidat :</label>
                            <?= form_input(["name"=>"candidatFirstName", "placeholder"=>"Entrer Prénom du candidat", "class"=>"form-control", "value"=>set_value("candidatFirstName")]); ?>
                            <small class="form-text text-muted"><?= form_error('candidatFirstName'); ?></small>
                        </div>

                        <div class="form-group">
                            <label style="color: white; font-weight: bold;">Photo du candidat :</label> <br>
                            <input style="color: white;" type="file" id="candidatPhoto" name="candidatPhoto" required accept="image/*">
                            <small class="form-text text-muted"><?= form_error('candidatPhoto'); ?></small>

                            

                        </div>

                        <br>

                        <div class="row">

                            <div class="form-group col-sm-6">
                                <small style="color: white;" class="form-text">Cliquez pour enregistrer</small>
                                <?= form_submit(["value"=>"Enregistrer", "style"=>"font-weight: bold;","class"=>"btn btn-primary"]); ?>
                            </div>

                            <div class="form-group col-sm-6">
                                <small style="color: white;" class="form-text">Cliquez pour voir la liste des candidats</small>
                                <?= anchor("/Fifidianana/getAllCandidat", "Tous les candidats", ["style"=>"font-weight: bold;", "class"=>"btn btn-success"]) ?>
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