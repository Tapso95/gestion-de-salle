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
        <h2 style="margin-top:0px">TypeCours <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">CodeTypeCours <?php echo form_error('codeTypeCours') ?></label>
            <input type="text" class="form-control" name="codeTypeCours" id="codeTypeCours" placeholder="CodeTypeCours" value="<?php echo $codeTypeCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomTypeCours <?php echo form_error('nomTypeCours') ?></label>
            <input type="text" class="form-control" name="nomTypeCours" id="nomTypeCours" placeholder="NomTypeCours" value="<?php echo $nomTypeCours; ?>" />
        </div>
	    <input type="hidden" name="idTypeCours" value="<?php echo $idTypeCours; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('typecours') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>