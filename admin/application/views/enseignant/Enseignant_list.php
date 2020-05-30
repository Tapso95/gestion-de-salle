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
        <h2 style="margin-top:0px">Enseignant List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('enseignant/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('enseignant/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('enseignant'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>IdGrade</th>
		<th>IdDepartement</th>
		<th>MatriculeEnseignant</th>
		<th>PasswordEnseignant</th>
		<th>NomEnseignant</th>
		<th>PrenomEnseignant</th>
		<th>DateNaissEnseignant</th>
		<th>TelephoneEnseignant</th>
		<th>EmailEnseignant</th>
		<th>Action</th>
            </tr><?php
            foreach ($enseignant_data as $enseignant)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $enseignant->idGrade ?></td>
			<td><?php echo $enseignant->idDepartement ?></td>
			<td><?php echo $enseignant->matriculeEnseignant ?></td>
			<td><?php echo $enseignant->passwordEnseignant ?></td>
			<td><?php echo $enseignant->nomEnseignant ?></td>
			<td><?php echo $enseignant->prenomEnseignant ?></td>
			<td><?php echo $enseignant->dateNaissEnseignant ?></td>
			<td><?php echo $enseignant->telephoneEnseignant ?></td>
			<td><?php echo $enseignant->emailEnseignant ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('enseignant/read/'.$enseignant->idEnseignant),'Read'); 
				echo ' | '; 
				echo anchor(site_url('enseignant/update/'.$enseignant->idEnseignant),'Update'); 
				echo ' | '; 
				echo anchor(site_url('enseignant/delete/'.$enseignant->idEnseignant),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>