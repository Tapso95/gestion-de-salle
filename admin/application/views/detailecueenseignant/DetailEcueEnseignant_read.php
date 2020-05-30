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
        <h2 style="margin-top:0px">DetailEcueEnseignant Read</h2>
        <table class="table">
	    <tr><td>IdEnseignant</td><td><?php echo $idEnseignant; ?></td></tr>
	    <tr><td>IdEcue</td><td><?php echo $idEcue; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detailecueenseignant') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>