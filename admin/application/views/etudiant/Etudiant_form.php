<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Etudiant <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">IdNiveau <?php echo form_error('idNiveau') ?></label>
            <input type="text" class="form-control" name="idNiveau" id="idNiveau" placeholder="IdNiveau" value="<?php echo $idNiveau; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">MatriculeEtudiant <?php echo form_error('matriculeEtudiant') ?></label>
            <input type="text" class="form-control" name="matriculeEtudiant" id="matriculeEtudiant" placeholder="MatriculeEtudiant" value="<?php echo $matriculeEtudiant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomEtudiant <?php echo form_error('nomEtudiant') ?></label>
            <input type="text" class="form-control" name="nomEtudiant" id="nomEtudiant" placeholder="NomEtudiant" value="<?php echo $nomEtudiant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PrenomEtudiant <?php echo form_error('prenomEtudiant') ?></label>
            <input type="text" class="form-control" name="prenomEtudiant" id="prenomEtudiant" placeholder="PrenomEtudiant" value="<?php echo $prenomEtudiant; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">DateNaissEtudiant <?php echo form_error('dateNaissEtudiant') ?></label>
            <input type="text" class="form-control" name="dateNaissEtudiant" id="dateNaissEtudiant" placeholder="DateNaissEtudiant" value="<?php echo $dateNaissEtudiant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">LieuNaissEtudiant <?php echo form_error('lieuNaissEtudiant') ?></label>
            <input type="text" class="form-control" name="lieuNaissEtudiant" id="lieuNaissEtudiant" placeholder="LieuNaissEtudiant" value="<?php echo $lieuNaissEtudiant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">TelephoneEtudiant <?php echo form_error('telephoneEtudiant') ?></label>
            <input type="text" class="form-control" name="telephoneEtudiant" id="telephoneEtudiant" placeholder="TelephoneEtudiant" value="<?php echo $telephoneEtudiant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EmailEtudiant <?php echo form_error('emailEtudiant') ?></label>
            <input type="text" class="form-control" name="emailEtudiant" id="emailEtudiant" placeholder="EmailEtudiant" value="<?php echo $emailEtudiant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PasswordEtudiant <?php echo form_error('passwordEtudiant') ?></label>
            <input type="text" class="form-control" name="passwordEtudiant" id="passwordEtudiant" placeholder="PasswordEtudiant" value="<?php echo $passwordEtudiant; ?>" />
        </div>
	    <input type="hidden" name="idEtudiant" value="<?php echo $idEtudiant; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('etudiant') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>