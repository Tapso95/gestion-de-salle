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
        <h2 style="margin-top:0px">RapportSurveillance Read</h2>
        <table class="table">
	    <tr><td>IdSurveillant</td><td><?php echo $idSurveillant; ?></td></tr>
	    <tr><td>IdCours</td><td><?php echo $idCours; ?></td></tr>
	    <tr><td>DateRapportSurveillance</td><td><?php echo $dateRapportSurveillance; ?></td></tr>
	    <tr><td>CommentaireRapportSurveillance</td><td><?php echo $commentaireRapportSurveillance; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rapportsurveillance') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>