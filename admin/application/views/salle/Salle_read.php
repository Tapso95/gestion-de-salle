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
        <h2 style="margin-top:0px">Salle Read</h2>
        <table class="table">
	    <tr><td>NomSalle</td><td><?php echo $nomSalle; ?></td></tr>
	    <tr><td>CodeSalle</td><td><?php echo $codeSalle; ?></td></tr>
	    <tr><td>NombrePlaceSalle</td><td><?php echo $nombrePlaceSalle; ?></td></tr>
	    <tr><td>IdTypeSalle</td><td><?php echo $idTypeSalle; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('salle') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>