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
        <h2 style="margin-top:0px">Examen <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NomExamen <?php echo form_error('nomExamen') ?></label>
            <input type="text" class="form-control" name="nomExamen" id="nomExamen" placeholder="NomExamen" value="<?php echo $nomExamen; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">DateDebutExamen <?php echo form_error('dateDebutExamen') ?></label>
            <input type="text" class="form-control" name="dateDebutExamen" id="dateDebutExamen" placeholder="DateDebutExamen" value="<?php echo $dateDebutExamen; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">DateFinExamen <?php echo form_error('dateFinExamen') ?></label>
            <input type="text" class="form-control" name="dateFinExamen" id="dateFinExamen" placeholder="DateFinExamen" value="<?php echo $dateFinExamen; ?>" />
        </div>
	    <input type="hidden" name="idExamen" value="<?php echo $idExamen; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('examen') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>