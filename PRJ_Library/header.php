<?php
include_once '../PRJ_Library/connect_DB.php';

?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8"> 
        <title><?php echo $pageTitle ?></title>
        <link href="Template.css" rel="stylesheet" type="text/css"/>
        <!--<script src='http://code.jquery.com/jquery-2.1.4.min.js'></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="../Code/dangkydangnhap.css" rel="stylesheet" type="text/css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <script src="../PRJ_Library/typeahead.js" type="text/javascript"></script>
        
        <link href="../MyCode/dangkydangnhap.css" rel="stylesheet" type="text/css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        

        <script>

            //code search
            $(document).ready(function () {

                $('#txtSearch').typeahead({

                    source: function (query, result) {
                        console.log(query);
                        $.ajax({
                            url: "searchProduct.php",
                            data: 'query=' + query,
                            dataType: "json",
                            type: "POST",
                            success: function (data) {
                                console.log(query);
                                result($.map(data, function (item) {

                                    return item;

                                }));
                            }
                        });
                    }
                });
            });

            $('#txtSearch').typeahead().bind('typeahead:closed', function () {
                $(this).val("");
            });

            $('#txtSearch').on('typeahead:cursorchanged', function (e, datum) {
                console.log(datum);
            });
            


        </script>

    </head>
    <body>
        <!--phần menu-->
        <div class="above-nav">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <p>PHPMOBILE@GMAIL.COM - Hotline:1900 9090</p>
                    </div>
                    <div class="col-sm-3 <?php if ($activeMenu == 'taikhoan') {
    echo 'active';
} ?>">

                        <?php
                        if (isset($_SESSION["username"])) {
                            ?>
                            <div id="logout" style="padding-top: 4%;">
                                <i class="glyphicon glyphicon-user" style="font-size: 18px; color:#f1f5f7 !important;"></i>
                                <a href="quanlytaikhoan.php" style="padding-left: 8%; color: white;  font-size: 14px;">
                                    <?php
                                    echo "Chào " . $_SESSION["username"];
                                    ?>

                                </a>
                                <a style="color: white;">
                                    <?php
                                    echo "|"
                                    ?>
                                </a>
                                <a id="bt_logout" name="bt_logout" href="log_out_user.php" style="padding-left: 1%; color: white; font-size: 14px;">Đăng Xuất</a>

                            </div>
                            <?php
                        } else {
                            ?>
                        <a href="dangnhap.php" style="color: white;">
                                <i class="glyphicon glyphicon-user" style="font-size: 18px; color:#f1f5f7 !important;"></i>
                                <div style="padding-top: 4%; padding-left: 9%; color: white;  font-size: 14px;">
                                    Tài Khoản
                                </div>
                            </a>
                            <?php
                        }
                        ?>



                        <!--loginuser-->


                        <!--formloginuser-->
                       
                        
                   
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-wrapper">
            <nav class="navbar-custom" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <!--<a class="navbar-logo" href="#" class="pull-left">-->
                        <!--<img src="http://placehold.it/200x50&text=@1x" srcset="http://placehold.it/200x50&text=@1x 1x, http://placehold.it/400x100&text=@2x 2x" alt="image" width="200" height="50">-->
                        <!--</a>-->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="Home.php" class="navbar-logo">
                            <img style="height: 50px; display: inline-block;"
                                 src="../Images/logophpmobile_1.jpg" usemap="#Map" border="0">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-right" id="navbar-menu">


                            <li class="<?php if ($activeMenu == 'home') {
                            echo 'active';
                        } ?>">
                                <a href="Home.php">Trang Chủ </a>

                            </li>
                            <li class="<?php if ($activeMenu == 'GioiThieu') {
                            echo 'active';
                        } ?>">
                                <a href="GioiThieu.php">Giới Thiệu</a>
                            </li>
                            <li class="<?php if ($activeMenu == 'LienHe') {
                            echo 'active';
                        } ?>">
                                <a href="LienHe.php">Liên Hệ</a>
                            </li>

                            <li>
                                <form action="" class="search-form">
                                    <div class="form-group has-feedback">
                                        <label for="search" class="sr-only">Search</label>
                                        <input type="text" class="form-control" name="search" id="txtSearch" placeholder="search">
                                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                    </div>
                                </form>

                            </li>

                            <li class="<?php if ($activeMenu == 'cart') {
                            echo 'active';
                        } ?>">
                                <a href="giohang.php">
                                    <button class="cart-form-button" id="cart">
                                        <span class="glyphicon glyphicon-shopping-cart" style="font-size: 18px;"></span>
                                    </button>
                                    <span class="cart-item-quality"><?php
                                        $count = 0;
                                        if (isset($_SESSION["cartuser"])) {
                                            foreach ($_SESSION["cartuser"] as $ID => $SP) {
                                                $count += $SP->proAmount;
                                            }
                                        }
                                        echo $count;
                                        ?></span>
                                </a>


                            </li>


                        </ul>

                    </div>
                </div><!-- /.container-fluid -->

            </nav>

        </div>
        <hr style="opacity: 0.0; margin-top: 0%;"/>   
        <div style="background-color: #fff">
