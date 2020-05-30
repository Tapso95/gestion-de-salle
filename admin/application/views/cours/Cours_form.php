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
        <h2 style="margin-top:0px">Cours <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">IdTypeCours <?php echo form_error('idTypeCours') ?></label>
            <input type="text" class="form-control" name="idTypeCours" id="idTypeCours" placeholder="IdTypeCours" value="<?php echo $idTypeCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">StatutCours <?php echo form_error('statutCours') ?></label>
            <input type="text" class="form-control" name="statutCours" id="statutCours" placeholder="StatutCours" value="<?php echo $statutCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">DateCours <?php echo form_error('dateCours') ?></label>
            <input type="text" class="form-control" name="dateCours" id="dateCours" placeholder="DateCours" value="<?php echo $dateCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">HeureDebutCours <?php echo form_error('heureDebutCours') ?></label>
            <input type="text" class="form-control" name="heureDebutCours" id="heureDebutCours" placeholder="HeureDebutCours" value="<?php echo $heureDebutCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">HeureFinCours <?php echo form_error('heureFinCours') ?></label>
            <input type="text" class="form-control" name="heureFinCours" id="heureFinCours" placeholder="HeureFinCours" value="<?php echo $heureFinCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">EnabledCours <?php echo form_error('enabledCours') ?></label>
            <input type="text" class="form-control" name="enabledCours" id="enabledCours" placeholder="EnabledCours" value="<?php echo $enabledCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">AcceptedCours <?php echo form_error('acceptedCours') ?></label>
            <input type="text" class="form-control" name="acceptedCours" id="acceptedCours" placeholder="AcceptedCours" value="<?php echo $acceptedCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdEcue <?php echo form_error('idEcue') ?></label>
            <input type="text" class="form-control" name="idEcue" id="idEcue" placeholder="IdEcue" value="<?php echo $idEcue; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdSalle <?php echo form_error('idSalle') ?></label>
            <input type="text" class="form-control" name="idSalle" id="idSalle" placeholder="IdSalle" value="<?php echo $idSalle; ?>" />
        </div>
	    <input type="hidden" name="idCours" value="<?php echo $idCours; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('cours') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>