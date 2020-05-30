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
        <h2 style="margin-top:0px">Evaluation Read</h2>
        <table class="table">
	    <tr><td>IdEtudiant</td><td><?php echo $idEtudiant; ?></td></tr>
	    <tr><td>IdCours</td><td><?php echo $idCours; ?></td></tr>
	    <tr><td>NoteEvaluation</td><td><?php echo $noteEvaluation; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('evaluation') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>