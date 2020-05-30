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
        <h2 style="margin-top:0px">DetailEcueEnseignant <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">IdEnseignant <?php echo form_error('idEnseignant') ?></label>
            <input type="text" class="form-control" name="idEnseignant" id="idEnseignant" placeholder="IdEnseignant" value="<?php echo $idEnseignant; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdEcue <?php echo form_error('idEcue') ?></label>
            <input type="text" class="form-control" name="idEcue" id="idEcue" placeholder="IdEcue" value="<?php echo $idEcue; ?>" />
        </div>
	    <input type="hidden" name="idDetail" value="<?php echo $idDetail; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detailecueenseignant') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>