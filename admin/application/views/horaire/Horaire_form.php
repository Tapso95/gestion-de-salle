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
        <h2 style="margin-top:0px">Horaire <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="datetime">HeureDebut <?php echo form_error('heureDebut') ?></label>
            <input type="text" class="form-control" name="heureDebut" id="heureDebut" placeholder="HeureDebut" value="<?php echo $heureDebut; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">HeureFin <?php echo form_error('heureFin') ?></label>
            <input type="text" class="form-control" name="heureFin" id="heureFin" placeholder="HeureFin" value="<?php echo $heureFin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomJour <?php echo form_error('nomJour') ?></label>
            <input type="text" class="form-control" name="nomJour" id="nomJour" placeholder="NomJour" value="<?php echo $nomJour; ?>" />
        </div>
	    <input type="hidden" name="idHoraire" value="<?php echo $idHoraire; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('horaire') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>