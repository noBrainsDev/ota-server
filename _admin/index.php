<?php
require_once dirname(__FILE__) . '/../config/config.php';
if (!$config) die('Fatal error: Cannot load file config file');
ob_start();
if (!isset($_SESSION['administrator'])) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $config['general']['site_name'] ?> - Admin panel">
    <meta name="author" content="<?= $config['general']['author'] ?>">
    <meta name="keyword" content="">

    <title><?php echo $config['general']['site_name']; ?> - Admin Panel</title>

    <link rel="shortcut icon" type="image/png" href="../<?php echo $config['path']['favicon']; ?>"/>

    <!-- Bootstrap core CSS -->
    <link href="../files/css/bootstrap/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../files/plugins/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="../files/css/admin.css" rel="stylesheet">
    <link href="../files/css/admin-responsive.css" rel="stylesheet">

    <script src="../files/plugins/chart-master/Chart.js"></script>
    <script src="../files/js/admin/sortable.js"></script>

</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.php" class="logo"><img src="../<?php echo $config['path']['logo']; ?>" style="height: 30px;"></a>
        <!--logo end-->
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="../files/action.php?action=logout">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="mt">
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="?page=personal">
                        <i class="fa fa-user"></i>
                        <span>My details</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="?page=system">
                        <i class="fa fa-server"></i>
                        <span>System</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="?page=log">
                        <i class="fa fa-server"></i>
                        <span>System log</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="?page=settings">
                        <i class="fa fa-cogs"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->