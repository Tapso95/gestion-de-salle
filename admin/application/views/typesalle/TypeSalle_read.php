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
        <h2 style="margin-top:0px">TypeSalle Read</h2>
        <table class="table">
	    <tr><td>CodeTypeSalle</td><td><?php echo $codeTypeSalle; ?></td></tr>
	    <tr><td>NomTypeSalle</td><td><?php echo $nomTypeSalle; ?></td></tr>
	    <tr><td>StatusTypeSalle</td><td><?php echo $statusTypeSalle; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('typesalle') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>