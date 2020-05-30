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
        <h2 style="margin-top:0px">Examen Read</h2>
        <table class="table">
	    <tr><td>NomExamen</td><td><?php echo $nomExamen; ?></td></tr>
	    <tr><td>DateDebutExamen</td><td><?php echo $dateDebutExamen; ?></td></tr>
	    <tr><td>DateFinExamen</td><td><?php echo $dateFinExamen; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('examen') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>