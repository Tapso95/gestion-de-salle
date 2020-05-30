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
        <h2 style="margin-top:0px">Evaluation <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">IdEtudiant <?php echo form_error('idEtudiant') ?></label>
            <input type="text" class="form-control" name="idEtudiant" id="idEtudiant" placeholder="IdEtudiant" value="<?php echo $idEtudiant; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdCours <?php echo form_error('idCours') ?></label>
            <input type="text" class="form-control" name="idCours" id="idCours" placeholder="IdCours" value="<?php echo $idCours; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">NoteEvaluation <?php echo form_error('noteEvaluation') ?></label>
            <input type="text" class="form-control" name="noteEvaluation" id="noteEvaluation" placeholder="NoteEvaluation" value="<?php echo $noteEvaluation; ?>" />
        </div>
	    <input type="hidden" name="idEvaluation" value="<?php echo $idEvaluation; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('evaluation') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>