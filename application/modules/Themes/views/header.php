<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url(THEME_PATH.'assets/img/Web_Coach.jpg');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $title;?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="<?php echo base_url(THEME_PATH.'assets/css/bootstrap.min.css');?>" rel="stylesheet" />
    <link href="<?php echo base_url(THEME_PATH.'assets/css/light-bootstrap-dashboard.css?v=2.0.1');?>" rel="stylesheet" />
    <!--Datepicker File-->
    <link rel="stylesheet" href="<?php echo base_url(THEME_PATH.'assets/css/jquery-ui.css');?>">
    <!--Datatable File-->
    <link href="<?php echo base_url(THEME_PATH.'datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <!--Ckeditor-->
    <script src="<?php echo base_url(THEME_PATH.'ckeditor/ckeditor.js ');?>"></script>

    <style>
        body {width:100%; height:100%; overflow:hidden; margin:0; }
        html {width:100%; height:100%; overflow:hidden; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-image="<?php echo base_url(THEME_PATH.'assets/img/sidebar-5.jpg');?>">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                       Web Coach
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <?php $user_id = $this->session->userdata('id');?>
                        <?php $role_id = $this->session->userdata('role_id');?>
                        <?php if($role_id == USER_ROLE_STUDENT) { ?>
                        <a class="nav-link" href="<?php echo base_url('home/frontend/dashboard/'.$user_id.'/'.$role_id);?>">
                             <i class="nc-icon nc-chart-pie-35"></i>
                             <p>Dashboard</p>
                         </a>
                        <?php } else { ?>
                        <a class="nav-link" href="<?php echo base_url('home/admin/dashboard/'.$user_id.'/'.$role_id);?>">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                        <?php } ?>  
                    </li>
                    <li>
                        <?php $user_id = $this->session->userdata('id');?>
                        <?php $role_id = $this->session->userdata('role_id');?>
                        <a class="nav-link" href="<?php echo base_url('users/admin/user_profile/'.$user_id.'/'.$role_id);?>">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
		<div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href=""> <?php echo $title;?> </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="" class="nav-link" data-toggle="dropdown">
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url("users/action/logout")?>">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
			 <div class="content">
                <div class="container-fluid">