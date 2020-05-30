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
        <h2 style="margin-top:0px">Grade <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">CodeGrade <?php echo form_error('codeGrade') ?></label>
            <input type="text" class="form-control" name="codeGrade" id="codeGrade" placeholder="CodeGrade" value="<?php echo $codeGrade; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NomGrade <?php echo form_error('nomGrade') ?></label>
            <input type="text" class="form-control" name="nomGrade" id="nomGrade" placeholder="NomGrade" value="<?php echo $nomGrade; ?>" />
        </div>
	    <input type="hidden" name="idGrade" value="<?php echo $idGrade; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('grade') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>