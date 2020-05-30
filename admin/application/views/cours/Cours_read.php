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
        <h2 style="margin-top:0px">Cours Read</h2>
        <table class="table">
	    <tr><td>IdTypeCours</td><td><?php echo $idTypeCours; ?></td></tr>
	    <tr><td>StatutCours</td><td><?php echo $statutCours; ?></td></tr>
	    <tr><td>DateCours</td><td><?php echo $dateCours; ?></td></tr>
	    <tr><td>HeureDebutCours</td><td><?php echo $heureDebutCours; ?></td></tr>
	    <tr><td>HeureFinCours</td><td><?php echo $heureFinCours; ?></td></tr>
	    <tr><td>EnabledCours</td><td><?php echo $enabledCours; ?></td></tr>
	    <tr><td>AcceptedCours</td><td><?php echo $acceptedCours; ?></td></tr>
	    <tr><td>IdEcue</td><td><?php echo $idEcue; ?></td></tr>
	    <tr><td>IdSalle</td><td><?php echo $idSalle; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('cours') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>