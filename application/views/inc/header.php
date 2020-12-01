<?php
$gur = $this->session->userdata('user_role'); // global user role
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My CI</title>
        <!-- Bootstrap -->
        <link href="{base_url}assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{base_url}assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="{base_url}assets/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="{base_url}assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Switchery -->
        <link href="{base_url}assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="{base_url}assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="{base_url}assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="{base_url}assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="{base_url}assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="{base_url}assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="{base_url}assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
        <link href="{base_url}assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- FullCalendar -->
        <link href="{base_url}assets/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="{base_url}assets/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
        <!-- bootstrap-progressbar -->
        <link href="{base_url}assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="{base_url}assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <!-- Custom Theme Style -->
        <link href="{base_url}assets/build/css/custom.css" rel="stylesheet">
        <link href="{base_url}assets/build/css/style.css" rel="stylesheet">
    </head>
    <body class="nav-md">
        <div class="container body">
        <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{base_url}" class="site_title"><img src="{base_url}/assets/images/logo.jpg"> <span>My CI</span></a>

                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <!-- <img src="{base_url}assets/images/img.jpg" alt="..." class="img-circle profile_img"> -->
                        <i class="fa fa-user-circle-o"></i>
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?=$this->session->userdata('user_fullname')?></h2>
                        <h3><?=$this->session->userdata('user_department');?></h3>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="{base_url}"><i class="fa fa-home"></i> Dashboard </a></li>
                            <li>
                                <a><i class="fa fa-wrench"></i> Manage users <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                <?=($gur->users) ? '<li><a href="{base_url}users">All users</a></li>' : ''?>
                                <?=($gur->users_add) ? '<li><a href="{base_url}users/add">Add users</a></li>' : ''?>
								<?=($gur->user_role) ? '<li><a href="{base_url}users/roles">All user roles</a></li>' : ''?>
								<?=($gur->user_role) ? '<li><a href="{base_url}users/addroles">Add user roles</a></li>' : ''?>
                                </ul>
                            </li>
                            <li><a href="#">USER GUIDANCE </a>
                            </li>
                        </ul>
                        <?php //} ?>
                    </div>
                </div>
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
                <!-- /menu footer buttons -->
            </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right row" style="width: 94%;">
					<li class="col-md-10" style="
							float: left;
							font-size: 19px;
							font-weight: 600;
							margin-top: 14px;
							text-align: center;
						">{app_name}</li>

						<li class="col-md-2"><a href="{base_url}secure/logout" style="float: right;"><i class="fa fa-sign-out"></i> Log Out</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- COMMON HEADER END HERE -->
