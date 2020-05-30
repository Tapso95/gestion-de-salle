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
        <h2 style="margin-top:0px">Horaire Read</h2>
        <table class="table">
	    <tr><td>HeureDebut</td><td><?php echo $heureDebut; ?></td></tr>
	    <tr><td>HeureFin</td><td><?php echo $heureFin; ?></td></tr>
	    <tr><td>NomJour</td><td><?php echo $nomJour; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('horaire') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>