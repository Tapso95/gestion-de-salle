                <div class="content">
                    <div class="page-content-wrapper ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 col-lg-12  col-xl-12">
                                    <div class="card m-b-30">
                                        <h5 class="card-header">Liste des salles</h5>
                                        <div class="card-body table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th >Nom </th>
                                                        <th >Code</th>
                                                        <th >Nombre de place</th>
                                                        <th >Type de salle</th>
                                                        <th >Description de la salle</th>
                                                        <th >Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($salles as $salle) { ?>
                                                    <tr>
                                                        <td> <?php echo $salle->nomSalle ?></td>
                                                        <td> <?php echo $salle->codeSalle ?></td>
                                                        <td> <?php echo $salle->nombrePlaceSalle ?></td>
                                                        <td> <?php echo $salle->nomTypeSalle ?></td>
                                                        <td> <?php echo $salle->descriptionSalle ?></td>
                                                        <td> <a class="btn btn-success" href="<?php echo base_url().'assistant/booking_form/'.$salle->idSalle ?>">Réserver</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                           <!--  <div class="row">
                                <div class="col-md-12 col-lg-12  col-xl-12">
                                    <div class="card m-b-30">
                                        <h5 class="card-header">Liste des salles non réservées</h5>
                                        <div class="card-body table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th >Nom </th>
                                                        <th >Code</th>
                                                        <th >Nombre de place</th>
                                                        <th >Type de salle</th>
                                                        <th >Description de la salle</th>
                                                        <th >Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($salles as $salle) { ?>
                                                    <tr>
                                                        <td> <?php echo $salle->nomSalle ?></td>
                                                        <td> <?php echo $salle->codeSalle ?></td>
                                                        <td> <?php echo $salle->nombrePlaceSalle ?></td>
                                                        <td> <?php echo $salle->nomTypeSalle ?></td>
                                                        <td> <?php echo $salle->descriptionSalle ?></td>
                                                        <td> <a class="btn btn-success" href="<?php echo base_url().'assistant/booking_form/'.$salle->idSalle ?>">Réserver</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> --><!--end row-->

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->