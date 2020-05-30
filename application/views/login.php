<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Gestion des Classe | Connexion</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">

        <link href="<?php echo base_url(); ?>assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-material-design.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">


    </head>


    <body>

         <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="display-table">
            <div class="display-table-cell">
                <diV class="container ">
                    <div class="row justify-content-center">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center pt-3">
                                    <a href="index.html">
                                        <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" height="22" />
                                    </a>
                                </div>
                                <div class="px-3 pb-3">
                                    <form class="form-horizontal m-t-20 mb-0" method="POST" action="">
                
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" name="email" type="text" required="" value="<?php echo (isset($email))?$email:'';?>" placeholder="Email">
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="form-group text-right row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-raised btn-block waves-effect waves-light" type="submit">connexion</button>
                                            </div>
                                        </div>
                
                                        <div class="form-group m-t-10 mb-0 row">
                                            <div class="col-sm-7 m-t-20">
                                                <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password ?</a>
                                            </div>
                                            <div class="col-sm-5 m-t-20">
                                                <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account ?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                
                            </div>
                        </div>                       
                    </div>
                </diV>
            </div>
        </div>
    </div>




        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-material-design.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
        
    </body>
</html>