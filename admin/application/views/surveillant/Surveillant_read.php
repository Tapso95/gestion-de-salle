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
        <h2 style="margin-top:0px">Surveillant Read</h2>
        <table class="table">
	    <tr><td>NomSurveillant</td><td><?php echo $nomSurveillant; ?></td></tr>
	    <tr><td>PrenomSurveillant</td><td><?php echo $prenomSurveillant; ?></td></tr>
	    <tr><td>TelephoneSurveillant</td><td><?php echo $telephoneSurveillant; ?></td></tr>
	    <tr><td>PasswordSurveillant</td><td><?php echo $passwordSurveillant; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('surveillant') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>