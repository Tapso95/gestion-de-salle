<div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="mdi mdi-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!--<a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Urora</a>-->
                        <a href="<?php echo base_url(); ?>welcome" class="logo">
                            <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" class="logo-large">
                        </a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft" id="sidebar-main">

                    <div id="sidebar-menu">
                        <ul>
<!--                             <li class="menu-title">Main</li>
 -->
                            <li>
                                <a href="index.html" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Tableau de board
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>welcome" class="waves-effect">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span> Cours
                                    </span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect">
                                    <i class="mdi mdi-animation"></i>
                                    <span> Emploi du temps </span>
                                    <span class="float-right">
                                        <i class="mdi mdi-chevron-right"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="<?php echo base_url(); ?>welcome/get_calendar">Ce mois</a>
                                    </li>
                                    <!-- <li>
                                        <a href="#">La semaine prochaine</a>
                                    </li> -->
                                </ul>
                            </li>
                              
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- end sidebarinner -->
            </div>