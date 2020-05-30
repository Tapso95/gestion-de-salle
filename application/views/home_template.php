<!DOCTYPE html>
<html lang="en">
    <head>
    <?php $this->load->view('Templates/header-script.php'); ?>
    
     </head>
    <body class="fixed-left">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner"></div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
             <?php $this->load->view($left_menu); ?>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <?php 	$this->load->view('Templates/header-menu');?>
                    <!-- Top Bar End -->
                    <?php $this->load->view($page);?>
                    
                    <!-- Page content Wrapper -->
                </div>
                <!-- content -->
            <?php $this->load->view('Templates/footer.php'); ?>

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->
          <?php $this->load->view('Templates/footer-script.php'); ?>
    </body>

</html>