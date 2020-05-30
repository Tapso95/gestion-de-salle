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
        <h2 style="margin-top:0px">Surveillant <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NomSurveillant <?php echo form_error('nomSurveillant') ?></label>
            <input type="text" class="form-control" name="nomSurveillant" id="nomSurveillant" placeholder="NomSurveillant" value="<?php echo $nomSurveillant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PrenomSurveillant <?php echo form_error('prenomSurveillant') ?></label>
            <input type="text" class="form-control" name="prenomSurveillant" id="prenomSurveillant" placeholder="PrenomSurveillant" value="<?php echo $prenomSurveillant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">TelephoneSurveillant <?php echo form_error('telephoneSurveillant') ?></label>
            <input type="text" class="form-control" name="telephoneSurveillant" id="telephoneSurveillant" placeholder="TelephoneSurveillant" value="<?php echo $telephoneSurveillant; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PasswordSurveillant <?php echo form_error('passwordSurveillant') ?></label>
            <input type="text" class="form-control" name="passwordSurveillant" id="passwordSurveillant" placeholder="PasswordSurveillant" value="<?php echo $passwordSurveillant; ?>" />
        </div>
	    <input type="hidden" name="idSurveillant" value="<?php echo $idSurveillant; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('surveillant') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>