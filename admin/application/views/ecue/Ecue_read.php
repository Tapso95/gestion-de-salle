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
        <h2 style="margin-top:0px">Ecue Read</h2>
        <table class="table">
	    <tr><td>IdUe</td><td><?php echo $idUe; ?></td></tr>
	    <tr><td>CreditEcue</td><td><?php echo $creditEcue; ?></td></tr>
	    <tr><td>NomEcue</td><td><?php echo $nomEcue; ?></td></tr>
	    <tr><td>HeureCmEcue</td><td><?php echo $heureCmEcue; ?></td></tr>
	    <tr><td>HeureTdEcue</td><td><?php echo $heureTdEcue; ?></td></tr>
	    <tr><td>HeureTpEcue</td><td><?php echo $heureTpEcue; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ecue') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>