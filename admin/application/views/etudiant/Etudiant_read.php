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
        <h2 style="margin-top:0px">Etudiant Read</h2>
        <table class="table">
	    <tr><td>IdNiveau</td><td><?php echo $idNiveau; ?></td></tr>
	    <tr><td>MatriculeEtudiant</td><td><?php echo $matriculeEtudiant; ?></td></tr>
	    <tr><td>NomEtudiant</td><td><?php echo $nomEtudiant; ?></td></tr>
	    <tr><td>PrenomEtudiant</td><td><?php echo $prenomEtudiant; ?></td></tr>
	    <tr><td>DateNaissEtudiant</td><td><?php echo $dateNaissEtudiant; ?></td></tr>
	    <tr><td>LieuNaissEtudiant</td><td><?php echo $lieuNaissEtudiant; ?></td></tr>
	    <tr><td>TelephoneEtudiant</td><td><?php echo $telephoneEtudiant; ?></td></tr>
	    <tr><td>EmailEtudiant</td><td><?php echo $emailEtudiant; ?></td></tr>
	    <tr><td>PasswordEtudiant</td><td><?php echo $passwordEtudiant; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('etudiant') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>