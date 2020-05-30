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
        <h2 style="margin-top:0px">Niveau Read</h2>
        <table class="table">
	    <tr><td>CodeNiveau</td><td><?php echo $codeNiveau; ?></td></tr>
	    <tr><td>NomNiveau</td><td><?php echo $nomNiveau; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('niveau') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>