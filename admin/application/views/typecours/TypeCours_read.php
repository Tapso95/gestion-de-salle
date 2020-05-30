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
        <h2 style="margin-top:0px">TypeCours Read</h2>
        <table class="table">
	    <tr><td>CodeTypeCours</td><td><?php echo $codeTypeCours; ?></td></tr>
	    <tr><td>NomTypeCours</td><td><?php echo $nomTypeCours; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('typecours') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>