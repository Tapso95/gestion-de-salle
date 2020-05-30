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
        <h2 style="margin-top:0px">Enseignant Read</h2>
        <table class="table">
	    <tr><td>IdGrade</td><td><?php echo $idGrade; ?></td></tr>
	    <tr><td>IdDepartement</td><td><?php echo $idDepartement; ?></td></tr>
	    <tr><td>MatriculeEnseignant</td><td><?php echo $matriculeEnseignant; ?></td></tr>
	    <tr><td>PasswordEnseignant</td><td><?php echo $passwordEnseignant; ?></td></tr>
	    <tr><td>NomEnseignant</td><td><?php echo $nomEnseignant; ?></td></tr>
	    <tr><td>PrenomEnseignant</td><td><?php echo $prenomEnseignant; ?></td></tr>
	    <tr><td>DateNaissEnseignant</td><td><?php echo $dateNaissEnseignant; ?></td></tr>
	    <tr><td>TelephoneEnseignant</td><td><?php echo $telephoneEnseignant; ?></td></tr>
	    <tr><td>EmailEnseignant</td><td><?php echo $emailEnseignant; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('enseignant') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>