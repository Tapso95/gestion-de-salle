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
        <h2 style="margin-top:0px">Niveau <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">CodeNiveau <?php echo form_error('codeNiveau') ?></label>
            <input type="text" class="form-control" name="codeNiveau" id="codeNiveau" placeholder="CodeNiveau" value="<?php echo $codeNiveau; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomNiveau <?php echo form_error('nomNiveau') ?></label>
            <input type="text" class="form-control" name="nomNiveau" id="nomNiveau" placeholder="NomNiveau" value="<?php echo $nomNiveau; ?>" />
        </div>
	    <input type="hidden" name="idNiveau" value="<?php echo $idNiveau; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('niveau') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>