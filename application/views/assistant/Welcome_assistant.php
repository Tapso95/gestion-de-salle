            <div class="content">
                    <!-- Top Bar Start -->
                    
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                           <!--  <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                            <ol class="breadcrumb hide-phone p-0 m-0">
                                                <li class="breadcrumb-item"><a href="#">Urora</a></li>
                                                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                                <li class="breadcrumb-item active">Form Elements</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Form Elements</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div> -->
                            <!-- end page title end breadcrumb -->
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class=" m-b-30">
                                        <div class="">
                                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#my-course" role="tab" aria-selected="true">Tous les cours</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#new-course" role="tab"  aria-selected="false">Creer un cours</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="my-course" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-12 col-xl-12">
                                                            <div class="card m-b-30">
                                                            <h5 class="card-header">Cours déja programmés</h5>
                                                                <div class="card-body table-responsive">
                                                                   
                                                                    <div class="">
                                                                        <table id="datatable2" class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Module</th>
                                                                                <th>Enseignant</h>
                                                                                <th>Type de cours</th>
                                                                                <th>Date</th>
                                                                                <th>Heure</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                            </thead>
                            
                            
                                                                            <tbody>
                                                                            <?php foreach($courses as $course) { ?>                                                                         <tr>
                                                                                <td> <?php echo $course->nomEcue ?></td>
                                                                                <td> <?php echo $course->nomEnseignant." ".$course->prenomEnseignant ?></td>
                                                                                <td> <?php echo $course->nomTypeCours ?></td>
                                                                                <td> <?php echo $course->dateCours ?></td>
                                                                                <td> <?php echo $course->heureDebutCours." à ".$course->heureFinCours ?></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>           
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                        
                                                    </div> <!-- end row -->
                                                    <div class="row">
                                                        <div class="col-md-12 col-xl-12">
                                                            <div class="card m-b-30">
                                                            <h5 class="card-header">Demande de validation de cours par les professeurs</h5>
                                                                <div class="card-body table-responsive">
                                                                   
                                                                    <div class="">
                                                                        <table id="datatable2" class="table">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Module</th>
                                                                                <th>Enseignant</h>
                                                                                <th>Type de cours</th>
                                                                                <th>Date</th>
                                                                                <th>Heure</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                            </thead>
                            
                            
                                                                            <tbody>
                                                                            <?php foreach($notvalide_courses as $notvalide_course) { ?>
                                                                            <tr>
                                                                                <td> <?php echo $notvalide_course->nomEcue ?></td>
                                                                                <td> <?php echo $notvalide_course->nomEnseignant." ".$notvalide_course->prenomEnseignant ?></td>
                                                                                <td> <?php echo $notvalide_course->nomTypeCours ?></td>
                                                                                <td> <?php echo $notvalide_course->dateCours ?></td>
                                                                                <td> <?php echo $notvalide_course->heureDebutCours." à ".$notvalide_course->heureFinCours  ?></td>
                                                                                <td><?php echo anchor(site_url('cours/read/'.$notvalide_course->idCours),'Valider'); ?></td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>           
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                        
                                                    </div> <!-- end row -->
                                                </div>
                                                <div class="tab-pane fade" id="new-course" role="tabpanel" aria-labelledby="profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-12 col-xl-12">
                                                            <div class="card m-b-30">
                                                                <div class="card-body">
                                                                    <h4 class="mt-0 header-title">Création de cours</h4>
                                                                    <form class="mb-0" action="welcome/create_course" method="post">
                                                                        <div class="form-row">
                                                                            <div class="col-md-6 mb-3">
                                                                            <h6 class="text-muted">Nom de l'unité d'enseignement</h6>
                                                                            <select class="select2 form-control mb-3 custom-select" name="nom_ecue"  required=""  style="width: 100%; height:36px;">
                                                                                <option  disabled  selected >Select </option>
                                                                                <?php foreach($ecues as $ecue): ?>
                                                                                <option  value="<?php echo $ecue->idEcue; ?>" <?php echo  set_select('ecue', $ecue->idEcue); ?> ><?php echo $ecue->nomEcue; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-md-6 mb-3">
                                                                            <h6 class="text-muted">Salle</h6>
                                                                            <select class="select2 form-control mb-3 custom-select" name="id_salle"  required=""  style="width: 100%; height:36px;">
                                                                                <option  disabled  selected >Selectionner la salle </option>
                                                                                <?php foreach($salles as $salle): ?>
                                                                                <option  value="<?php echo $salle->idSalle; ?>" <?php echo  set_select('id_salle', $salle->idSalle); ?> ><?php echo $salle->nomSalle; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-md-6 mb-3">
                                                                            <h6 class="text-muted">Type de cours</h6>
                                                                            <select class="select2 form-control mb-3 custom-select"  name="type_cours"  required=""  style="width: 100%; height:36px;">
                                                                               <option  disabled  selected >Select </option>
                                                                                <?php foreach($typeCourses as $typeCourse): ?>
                                                                                <option  value="<?php echo $typeCourse->idTypeCours; ?>" <?php echo  set_select('typeCours', $typeCourse->idTypeCours); ?> ><?php echo $typeCourse->nomTypeCours; ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col-md-6 mb-3">
                                                                                <h6 class="text-muted">Date du cours</h6>
                                                                                <input type="text" class="form-control" placeholder="2017-06-04" name="date_cours" id="mdate">
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <h6 class="text-muted mt-3">Heure de debut</h6>
                                                                                <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                                                                    <input type="text" class="form-control" name="heure_debut_cours" value="01:35"> 
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                                <h6 class="text-muted mt-3">Heure de fin</h6>
                                                                                <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                                                                    <input type="text" class="form-control" name="heure_fin_cours" value="01:35"> 
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button class="btn btn-raised btn-primary mb-0" type="submit">Enregistrer</button>
                                                                    </form>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div> <!-- end col -->
                                                    </div> <!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row -->                

                        </div><!-- container -->

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->