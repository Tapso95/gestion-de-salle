                 <div class="content">
                    <div class="page-content-wrapper ">
                        <div class="container-fluid">
                             <div class="row">
                                                        <div class="col-md-12 col-xl-12">
                                                            <div class="card m-b-30">
                                                                <div class="card-body">
                                                                    <h4 class="mt-0 header-title">Réservation de salle</h4>
                                                                    <?php if (!$courses) {?>
                                                                        <div class="alert alert-info">
                                                                            <h4>Désolé tous les cours disponible sont dejà réservé<span><a href="<?php echo base_url().'welcome'?>"> Retourner à l'accueil</a></span></h4>
                                                                        </div>
                                                                    <?php } else {?>
                                                                        
                                                                    <form class="mb-0" action="assistant/booking" method="post">
                                                                        <div class="form-row">
                                                                            <div class="col-md-6 mb-3">
                                                                            <h6 class="text-muted">Nom du cours</h6>
                                                                            <select class="select2 form-control mb-3 custom-select" name="nom_ecue"  required=""  style="width: 100%; height:36px;">
                                                                                <option  disabled  selected >Select le cours </option>

                                                                                <?php foreach($courses as $course): ?>
                                                                                <option  value="<?php echo $course->idCours; ?>" <?php echo  set_select('course', $course->idCours); ?> ><?php echo $course->nomEcue." du ".$course->dateCours." de ".$course->heureDebutCours." à ".$course->heureFinCours; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                        <button class="btn btn-raised btn-primary mb-0" type="submit">Enregistrer</button>
                                                                    </form>
                                                                    <?php } ?>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
                                                </div><!-- container -->

                                            </div> <!-- Page content Wrapper -->
                                        </div> <!-- content -->