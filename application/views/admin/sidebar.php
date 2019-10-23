<style>
    h1.gold-bt {
        background-color: #a54602;
        color: white;
        padding: 7px 15px;
        border-top-left-radius: 10px;
        border-bottom-right-radius: 10px;
        margin-top: -10px!important;
    }
</style>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container">
    <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <div class="sidebar-menu">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
             <div class="logo">
                    <a href="index.html">
                        <img class="logo" src="<?php echo base_url(); ?>assets/images/logo1.png" width="90" alt="">

                    </a>
                </div>
                  
                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon">
                        <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>


                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>

            </header>

            <!--=======================================================================================-->
            <ul id="main-menu" class="" style="">
<!--                <li class="root-level">
                    <a onclick="loadview('test')">
                        <i class="entypo-gauge"></i>
                        <span>Test</span>
                    </a>
                </li>-->
                <li class="root-level">
                    <a onclick="loadview('dashboard')">
                        <i class="entypo-gauge"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="root-level">
                    <a onclick="loadview('block')">
                        <i class="entypo-menu"></i>
                        <span class="title">Sector</span>
                    </a>
                </li>
                <li class="root-level">
                    <a onclick="loadview('plot')">
                        <i class="entypo-plus"></i>
                        <span class="title">Add Plot</span>
                    </a>
                </li>

                <!--===========================-->
                <li class="has-sub root-level">
                    <a >
                        <i class="entypo-doc-landscape"></i>
                        <span class="title">Plot Booking</span>
                    </a>
                    <ul style="opacity: 0.2; height: 0px;">
                        <li>
                            <a onclick="loadview('book_plot')">
                                <span class="title">Book Plot</span>
                            </a>
                        </li>
                        <li>
                            <a onclick="loadview('all_plot_booking')">
                                <span class="title">All Plot Booking</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <!--===========================-->
                <li class="has-sub root-level">
                    <a >
                        <i class="entypo-newspaper"></i>
                        <span class="title">SectorWise Plot</span>
                    </a>
                    <ul style="opacity: 0.2; height: 0px;">
                        <?php $all_sec=$this->admin_model->list_sector();  ?>
                        <?php foreach ( $all_sec as $row) { ?>
                            <li>
                                <a onclick="loadview('all_plot/<?php echo $row["sec_id"]?>')">
                                    <span class="title"><?php echo $row['sec_name']?></span>
                                </a>
                            </li>
                        <?php }?>

                    </ul>
                </li>
                <!--===========================-->
                <li class="has-sub root-level">
                    <a >
                        <i class="entypo-users"></i>
                        <span class="title">Business Associate</span>
                    </a>
                    <ul style="opacity: 0.2; height: 0px;">
                            <li>
                                <a onclick="loadview('associate')">
                                    <span class="title">Add Associate</span>
                                </a>
                            </li>
                            <li>
                                <a onclick="loadview('all_associate')">
                                    <span class="title">All Associate</span>
                                </a>
                            </li>
                        <li>
                            <a onclick="loadview('role')">
                                <span class="title">Role & Commission</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="root-level">
                    <a onclick="loadview('genealogy')">
                        <i class="entypo-hourglass"></i>
                        <span class="title">Genealogy</span>
                    </a>
                </li>
                <li class="root-level">
                    <a onclick="loadview('all_commission')">
                        <i class="entypo-menu"></i>
                        <span class="title">All Commission</span>
                    </a>
                </li>
                <li class="root-level">
                    <a onclick="loadview('all_instalment')">
                        <i class="entypo-clock"></i>
                        <span class="title">Instalment History</span>
                    </a>
                </li>
                <li class="root-level">
                    <a onclick="loadview('all_commission_history')">
                        <i class="entypo-docs"></i>
                        <span class="title">Commission History</span>
                    </a>
                </li>
                <li class="root-level">
                    <a onclick="loadview('achievement')">
                        <i class="entypo-flashlight"></i>
                        <span class="title">Achievement</span>
                    </a>
                </li>
                <li class="root-level">
                    <a onclick="loadview('report')">
                        <i class="entypo-gauge"></i>
                        <span>Report</span>
                    </a>
                </li>

            <!--=======================================================================================-->
            <!--===========================-->
            <li class="has-sub root-level">
                <a >
                    <i class="entypo-user-add"></i>
                    <span class="title">Profile</span>
                </a>
                <ul style="opacity: 0.2; height: 0px;">
                    <li>
                        <a onclick="loadview('edit_associate/<?php echo $_SESSION['user_id'];?>')">
                            <span class="title"><i class="entypo-pencil"></i></i>Edit Profile</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="loadview('profile_detail/<?php echo $_SESSION["user_id"];?>')">
                            <span class="title"><i class="entypo-doc-text-inv"></i>Profile Detail</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="loadview('profile/<?php echo $_SESSION["user_id"];?>')">
                            <span class="title"><i class="entypo-shuffle"></i></i>Profile Image</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('login/logout') ?>">
                            <i class="entypo-logout"></i>  Log Out
                        </a>
                    </li>
                </ul>
            </li>
            </ul>
        </div>

    </div>

    <div class="main-content">

        <div class="row">

            <!-- Profile Info and Notifications -->
            <div class="col-md-4 col-sm-4 clearfix">

                <ul class="user-info pull-left pull-none-xsm">
                    <li> <span class="user-title"></span></li>

                </ul>


            </div>
            <div class="col-md-4 col-sm-4 clearfix" style="text-align: center;">
            </div>


            <!-- Raw Links -->
            <div class="col-md-4 col-sm-4 clearfix hidden-xs">

                <ul class="list-inline links-list pull-right">

                  <!---->
                    <li class="dropdown language-selector">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true" aria-expanded="false">
                            <i class="entypo-user"></i> <?php echo $_SESSION['username']; ?><i class="entypo-down-open-mini"></i>
                        </a>

                        <ul class="dropdown-menu pull-left">
                            <li>  <a onclick="loadview('profile/<?php echo $_SESSION['user_id'];?>')">
                                    <img src="<?php echo base_url() ?>uploads/<?php echo $_SESSION['profile_image']; ?>" alt=""
                                         class="img-circle" width="150"/>
                                </a></li>
                            <li>
                                <a onclick="loadview('edit_associate/<?php echo $_SESSION['user_id'];?>')">
                                    <i class="entypo-info"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a onclick="loadview('edit_associate/<?php echo $_SESSION['user_id'];?>')" >
                                    <i class="entypo-key"></i>
                                    <span>Change Password</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                  <!---->

                    <li>
                        <a href="<?php echo base_url('login/logout') ?>">
                            Log Out <i class="entypo-logout right"></i>
                        </a>
                    </li>
                </ul>

            </div>

        </div>

        <hr/>
