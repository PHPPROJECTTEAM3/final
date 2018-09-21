<?php
ob_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <link href="dangkydangnhap_admin.css" rel="stylesheet" type="text/css"/>

        <link href="AdminLTE.min.css" rel="stylesheet" type="text/css"/>
        <link href="Templateadmin.css" rel="stylesheet" type="text/css"/>
        <link href="_all-skins.min.css" rel="stylesheet" type="text/css"/>

        <link href="../blue/style2.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="../../Lib_/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../jquery-latest.js" type="text/javascript"></script>
        <script src="../jquery.tablesorter.js" type="text/javascript"></script>
        <link href="../blue/style.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-latest.js" type="text/javascript"></script>
        <script src="jquery.tablesorter.js" type="text/javascript"></script>
        <link href="blue/style.css" rel="stylesheet" type="text/css"/>
        <link href="blue/style2.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    </head>

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">

                <span class="logo-lg">PHPMOBILE</span>
            </a>


        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><h4>Danh Sách</h4></li>
                    <li class="active treeview">
                        <ul class="treeview-menu">
                            <li class="">
                                <a href="pageadmin.php">Sơ đồ thống kê </a>

                            </li>
                            <?php if ($_SESSION['role'] == 1) { ?>
                                <li class="">
                                    <a href="Adduser.php">Thêm admin</a>
                                </li>
                            <?php } ?>
                            <li class="">
                                <a href="Addmember.php">Khách Hàng</a>
                            </li>
                            <li class="">
                                <a href="Addadvertise.php">Quảng Cáo</a>
                            </li>
                            <li class="">
                                <a href="Addproduct.php">Sản Phẩm</a>
                            </li>
                            <li class="">
                                <a href="admin_manage_feedback.php">Feedback</a>     
                                <div style="
                                     display: inline-block;
                                     min-width: 9px;
                                     padding: 4px 4px;
                                     font-size: 10px;
                                     font-weight: 400;
                                     line-height: 1;
                                     color: #fff;
                                     text-align: center;
                                     white-space: nowrap;
                                     vertical-align: middle;
                                     background-color: #09afdf;
                                     border-radius: 7px;
                                     margin-left: 35%;
                                     margin-top: -30%;
                                     ">
                                         <?php
                                         $count = 0;
                                         $sql7 = "SELECT * FROM feed_back WHERE con_rep IS NULL";
                                         $result7 = mysqli_query($link, $sql7);
                                         $rowcount=mysqli_num_rows($result7);
                                         echo $rowcount;
                                         ?>
                                </div>
                            </li>

                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 style="color: #357ca5;">
                    PHPMOBILE
                </h1>