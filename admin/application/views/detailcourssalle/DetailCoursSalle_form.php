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
        <h2 style="margin-top:0px">DetailCoursSalle <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">IdCours <?php echo form_error('idCours') ?></label>
            <input type="text" class="form-control" name="idCours" id="idCours" placeholder="IdCours" value="<?php echo $idCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdSalle <?php echo form_error('idSalle') ?></label>
            <input type="text" class="form-control" name="idSalle" id="idSalle" placeholder="IdSalle" value="<?php echo $idSalle; ?>" />
        </div>
	    <input type="hidden" name="idDetailCoursSalle" value="<?php echo $idDetailCoursSalle; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detailcourssalle') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>