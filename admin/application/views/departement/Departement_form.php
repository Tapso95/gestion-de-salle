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
        <h2 style="margin-top:0px">Departement <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NomDepartement <?php echo form_error('nomDepartement') ?></label>
            <input type="text" class="form-control" name="nomDepartement" id="nomDepartement" placeholder="NomDepartement" value="<?php echo $nomDepartement; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">AdresseDepartement <?php echo form_error('adresseDepartement') ?></label>
            <input type="text" class="form-control" name="adresseDepartement" id="adresseDepartement" placeholder="AdresseDepartement" value="<?php echo $adresseDepartement; ?>" />
        </div>
	    <input type="hidden" name="idDepartement" value="<?php echo $idDepartement; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('departement') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>