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
        <h2 style="margin-top:0px">Salle <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NomSalle <?php echo form_error('nomSalle') ?></label>
            <input type="text" class="form-control" name="nomSalle" id="nomSalle" placeholder="NomSalle" value="<?php echo $nomSalle; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">CodeSalle <?php echo form_error('codeSalle') ?></label>
            <input type="text" class="form-control" name="codeSalle" id="codeSalle" placeholder="CodeSalle" value="<?php echo $codeSalle; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">NombrePlaceSalle <?php echo form_error('nombrePlaceSalle') ?></label>
            <input type="text" class="form-control" name="nombrePlaceSalle" id="nombrePlaceSalle" placeholder="NombrePlaceSalle" value="<?php echo $nombrePlaceSalle; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdTypeSalle <?php echo form_error('idTypeSalle') ?></label>
            <input type="text" class="form-control" name="idTypeSalle" id="idTypeSalle" placeholder="IdTypeSalle" value="<?php echo $idTypeSalle; ?>" />
        </div>
	    <input type="hidden" name="idSalle" value="<?php echo $idSalle; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('salle') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>