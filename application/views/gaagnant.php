<div class="container">

    <?php
    
        foreach ($allVote as $vote) {
        
            $totalVote = $vote->voteTotal;
            $voteInvalide = $vote->voteBlanc + $vote->voteMort;
            $voteValide = $totalVote - $voteInvalide;
            $voteMoyenne = $voteValide / 2; ?> 
            
            <h4 style="text-align: center; font-weight: bold; color: white;">Nombre electeurs : <?= $totalVote ?></h4>
            <h4 style="text-align: center; font-weight: bold; color: white;">Vote invalide : <?= $voteInvalide ?></h4>
            <h4 style="text-align: center; font-weight: bold; color: white;">Vote valide : <?= $voteValide ?></h4>
            
            <?php

        }
    
    ?>

    <hr style="background: white;">

    <div class="row">

        <div class="col-sm-6">

            <?php 

                foreach ($allVote as $vote) {
    
                    $totalVote = $vote->voteTotal;
                    $voteInvalide = $vote->voteBlanc + $vote->voteMort;
                    $voteValide = $totalVote - $voteInvalide;
                    $voteMoyenne = $voteValide / 2;
    
                }
 
                foreach ($allCandidat as $candidatWin) { 
                            
                    if ($candidatWin->candidatNombreVote >= $voteMoyenne) { ?>

                        <h3 style="text-align: center; font-weight: bold; color: white;">LE GAGNANT EST :</h3>

                        <img style="width: 100px; height: 100px; margin-left: 40%" src="<?= base_url()?><?= $candidatWin->candidatPhoto ?>">

                        <h2 style="text-align: center; font-weight: bold; color: white;">
                            <?= "N° ".$candidatWin->candidatNumero ?>
                        </h2>

                        <h2 style="text-align: center; font-weight: bold; color: white;">
                            <?= $candidatWin->candidatNombreVote." votes" ?>
                        </h2>

                        <?php $percentWin = (100 * $candidatWin->candidatNombreVote) / $voteValide; ?>

                        <h4 style="text-align: center; font-weight: bold; color: white;">
                            <?= ceil($percentWin)." % " ?>
                        </h4>

                        <h4 style="text-align: center; font-weight: bold; color: white;">
                            <?= $candidatWin->candidatName." ".$candidatWin->candidatFirstName ?>
                        </h4>

            <?php } } ?>

        </div>

        <div class="col-sm-6">

            <h3 style="text-align: center; font-weight: bold; color: white;">RANG GENERAL :</h3>

            <div style="text-align: center; font-weight: bold; color: white;" class="row">
                        
                <div class="col-sm-2">
                    <h4>Rang</h4>
                </div>

                <div class="col-sm-1">
                    <h4>N°</h4>
                </div>

                <div class="col-sm-2">
                    <h4>Photo</h4>
                </div>

                <div class="col-sm-5">
                    <h4>Nom</h4>
                </div>

                <div class="col-sm-2">
                    <h4>Vote</h4>
                </div>

            </div>

            <hr style="background: white;">

            <?php $i=1; foreach ($allCandidat as $candidat) { ?>

                <div style="text-align: center; font-weight: bold; color: white;" class="row">
                        
                    <div class="col-sm-2">
                        <h4><?= $i ?></h4>
                    </div>

                    <div class="col-sm-1">
                        <h4><?= $candidat->candidatNumero ?></h4>
                    </div>

                    <div class="col-sm-2">
                        <img style="width: 60px; height: 60px; margin-left: 25%" src="<?= base_url()?><?= $candidat->candidatPhoto ?>" alt="" srcset="">
                    </div>

                    <div class="col-sm-5">
                        <h4><?= $candidat->candidatName." ".$candidat->candidatFirstName ?></h4>
                    </div>

                    <div class="col-sm-2">
                        <h4><?= $candidat->candidatNombreVote?></h4>
                    </div>

                </div>

                <hr style="background: white;">

            <?php $i++; } ?>

        </div>

    </div>

</div>

<hr style="background: white;">

<div class="container">
    <div style="text-align: center;">
        <small style="color: white;" class="form-text">Cliquez pour acceder à la page d'accueil</small>
        <?= anchor("/Fifidianana/resetAll", "Page d'accueil", ["style"=>"font-weight: bold;", "class"=>"btn btn-success"]) ?>
    </div>
</div>

<hr style="background: white;">

<?php include "footer.php" ?>