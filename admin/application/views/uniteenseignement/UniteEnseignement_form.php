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
        <h2 style="margin-top:0px">UniteEnseignement <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">CodeUe <?php echo form_error('codeUe') ?></label>
            <input type="text" class="form-control" name="codeUe" id="codeUe" placeholder="CodeUe" value="<?php echo $codeUe; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomUe <?php echo form_error('nomUe') ?></label>
            <input type="text" class="form-control" name="nomUe" id="nomUe" placeholder="NomUe" value="<?php echo $nomUe; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">CreditUe <?php echo form_error('creditUe') ?></label>
            <input type="text" class="form-control" name="creditUe" id="creditUe" placeholder="CreditUe" value="<?php echo $creditUe; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdNiveau <?php echo form_error('idNiveau') ?></label>
            <input type="text" class="form-control" name="idNiveau" id="idNiveau" placeholder="IdNiveau" value="<?php echo $idNiveau; ?>" />
        </div>
	    <input type="hidden" name="idUe" value="<?php echo $idUe; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('uniteenseignement') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>