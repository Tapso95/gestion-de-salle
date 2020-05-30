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
        <h2 style="margin-top:0px">TypeSalle <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">CodeTypeSalle <?php echo form_error('codeTypeSalle') ?></label>
            <input type="text" class="form-control" name="codeTypeSalle" id="codeTypeSalle" placeholder="CodeTypeSalle" value="<?php echo $codeTypeSalle; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomTypeSalle <?php echo form_error('nomTypeSalle') ?></label>
            <input type="text" class="form-control" name="nomTypeSalle" id="nomTypeSalle" placeholder="NomTypeSalle" value="<?php echo $nomTypeSalle; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">StatusTypeSalle <?php echo form_error('statusTypeSalle') ?></label>
            <input type="text" class="form-control" name="statusTypeSalle" id="statusTypeSalle" placeholder="StatusTypeSalle" value="<?php echo $statusTypeSalle; ?>" />
        </div>
	    <input type="hidden" name="idTypeSalle" value="<?php echo $idTypeSalle; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('typesalle') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>