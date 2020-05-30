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
        <h2 style="margin-top:0px">Poste <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">IdEnseignant <?php echo form_error('idEnseignant') ?></label>
            <input type="text" class="form-control" name="idEnseignant" id="idEnseignant" placeholder="IdEnseignant" value="<?php echo $idEnseignant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">CodePoste <?php echo form_error('codePoste') ?></label>
            <input type="text" class="form-control" name="codePoste" id="codePoste" placeholder="CodePoste" value="<?php echo $codePoste; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomPoste <?php echo form_error('nomPoste') ?></label>
            <input type="text" class="form-control" name="nomPoste" id="nomPoste" placeholder="NomPoste" value="<?php echo $nomPoste; ?>" />
        </div>
	    <input type="hidden" name="idPoste" value="<?php echo $idPoste; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('poste') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>