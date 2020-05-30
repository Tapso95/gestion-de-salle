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
        <h2 style="margin-top:0px">Ecue <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">IdUe <?php echo form_error('idUe') ?></label>
            <input type="text" class="form-control" name="idUe" id="idUe" placeholder="IdUe" value="<?php echo $idUe; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">CreditEcue <?php echo form_error('creditEcue') ?></label>
            <input type="text" class="form-control" name="creditEcue" id="creditEcue" placeholder="CreditEcue" value="<?php echo $creditEcue; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomEcue <?php echo form_error('nomEcue') ?></label>
            <input type="text" class="form-control" name="nomEcue" id="nomEcue" placeholder="NomEcue" value="<?php echo $nomEcue; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">HeureCmEcue <?php echo form_error('heureCmEcue') ?></label>
            <input type="text" class="form-control" name="heureCmEcue" id="heureCmEcue" placeholder="HeureCmEcue" value="<?php echo $heureCmEcue; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">HeureTdEcue <?php echo form_error('heureTdEcue') ?></label>
            <input type="text" class="form-control" name="heureTdEcue" id="heureTdEcue" placeholder="HeureTdEcue" value="<?php echo $heureTdEcue; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">HeureTpEcue <?php echo form_error('heureTpEcue') ?></label>
            <input type="text" class="form-control" name="heureTpEcue" id="heureTpEcue" placeholder="HeureTpEcue" value="<?php echo $heureTpEcue; ?>" />
        </div>
	    <input type="hidden" name="idEcue" value="<?php echo $idEcue; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ecue') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>