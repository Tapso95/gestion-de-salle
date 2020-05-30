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
        <h2 style="margin-top:0px">Enseignant <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">IdGrade <?php echo form_error('idGrade') ?></label>
            <input type="text" class="form-control" name="idGrade" id="idGrade" placeholder="IdGrade" value="<?php echo $idGrade; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdDepartement <?php echo form_error('idDepartement') ?></label>
            <input type="text" class="form-control" name="idDepartement" id="idDepartement" placeholder="IdDepartement" value="<?php echo $idDepartement; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">MatriculeEnseignant <?php echo form_error('matriculeEnseignant') ?></label>
            <input type="text" class="form-control" name="matriculeEnseignant" id="matriculeEnseignant" placeholder="MatriculeEnseignant" value="<?php echo $matriculeEnseignant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PasswordEnseignant <?php echo form_error('passwordEnseignant') ?></label>
            <input type="text" class="form-control" name="passwordEnseignant" id="passwordEnseignant" placeholder="PasswordEnseignant" value="<?php echo $passwordEnseignant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomEnseignant <?php echo form_error('nomEnseignant') ?></label>
            <input type="text" class="form-control" name="nomEnseignant" id="nomEnseignant" placeholder="NomEnseignant" value="<?php echo $nomEnseignant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PrenomEnseignant <?php echo form_error('prenomEnseignant') ?></label>
            <input type="text" class="form-control" name="prenomEnseignant" id="prenomEnseignant" placeholder="PrenomEnseignant" value="<?php echo $prenomEnseignant; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">DateNaissEnseignant <?php echo form_error('dateNaissEnseignant') ?></label>
            <input type="text" class="form-control" name="dateNaissEnseignant" id="dateNaissEnseignant" placeholder="DateNaissEnseignant" value="<?php echo $dateNaissEnseignant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">TelephoneEnseignant <?php echo form_error('telephoneEnseignant') ?></label>
            <input type="text" class="form-control" name="telephoneEnseignant" id="telephoneEnseignant" placeholder="TelephoneEnseignant" value="<?php echo $telephoneEnseignant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EmailEnseignant <?php echo form_error('emailEnseignant') ?></label>
            <input type="text" class="form-control" name="emailEnseignant" id="emailEnseignant" placeholder="EmailEnseignant" value="<?php echo $emailEnseignant; ?>" />
        </div>
	    <input type="hidden" name="idEnseignant" value="<?php echo $idEnseignant; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('enseignant') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>