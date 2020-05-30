 <div class="content">
                    <!-- Top Bar Start -->
                    
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href=".">Admin</a></li>
                                                <li class="breadcrumb-item"><a href="#">Cours</a></li>
                                               <!--  <li class="breadcrumb-item active">Form Validation</li> -->
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Cours</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <!-- end page title end breadcrumb -->
                            <div class="row">
                            <div class="col-md-12 col-xl-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="general-label">


        <h2 style="margin-top:0px">Liste des cours</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('cours/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <!-- <div class="col-md-1 text-right">
            </div> -->
            <div class="col-md-4 text-right">
                <form action="<?php echo site_url('cours/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $data['q']; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($data['q'] <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('cours'); ?>" class="btn btn-default">Reset</a>
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
		<th>IdTypeCours</th>
		<th>StatutCours</th>
		<th>DateCours</th>
		<th>HeureDebutCours</th>
		<th>HeureFinCours</th>
		<th>EnabledCours</th>
		<th>AcceptedCours</th>
		<th>IdEcue</th>
		<th>IdSalle</th>
		<th>Action</th>
            </tr><?php
            foreach ($data['cours_data'] as $cours)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$data['start'] ?></td>
			<td><?php echo $cours->idTypeCours ?></td>
			<td><?php echo $cours->statutCours ?></td>
			<td><?php echo $cours->dateCours ?></td>
			<td><?php echo $cours->heureDebutCours ?></td>
			<td><?php echo $cours->heureFinCours ?></td>
			<td><?php echo $cours->enabledCours ?></td>
			<td><?php echo $cours->acceptedCours ?></td>
			<td><?php echo $cours->idEcue ?></td>
			<td><?php echo $cours->idSalle ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('cours/read/'.$cours->idCours),'Read'); 
				echo ' | '; 
				echo anchor(site_url('cours/update/'.$cours->idCours),'Update'); 
				echo ' | '; 
				echo anchor(site_url('cours/delete/'.$cours->idCours),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $data['total_rows'] ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $data['pagination'] ?>
            </div>
        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->