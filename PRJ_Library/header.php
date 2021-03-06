<?php
include_once '../PRJ_Library/connect_DB.php';
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8"> 
        <title><?php echo $pageTitle ?></title>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="../Lib_/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="Template.css" rel="stylesheet" type="text/css"/>
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="../Code/dangkydangnhap.css" rel="stylesheet" type="text/css"/>
        <link href="../Code/thongtinsanpham.css" rel="stylesheet" type="text/css"/>
        <link href="../Code/search.css" rel="stylesheet" type="text/css"/>
        <script>

//-------Ajax
            $(document).ready(function () {
                // phần đầu tiên
                $("#xemthem_brand").css("display", "none");
                $.get("../Xuly/San_Pham.php", {page: 1}, function (data) {
                    $("#product_H").html(data);
                    if (data.length == 0)
                    {
                        $("#no_data").css("display", "block");
                        $("#xemthem").css("display", "none");
                    } else {
                        $("#no_data").css("display", "none");
                        $("#xemthem").css("display", "block");
                    }
                });
                var page_H = 1;
                $("#xemthem").click(function () {
                    page_H += 1;
                    $.get("../Xuly/San_Pham.php", {page: page_H}, function (data) {
                        $("#product_H").append(data);
                        if (data.length == 0)
                        {

                            $("#xemthem").css("display", "none");
                        } else {
                            $("#xemthem").css("display", "block");
                        }
                    });
                });
            });


            $(document).ready(function () {
                var brand_ss;
                // phần APPLE
                $("#APPLE").click(function () {
                    brand_ss = 'APPLE';
                    $("#xemthem").css("display", "none");
                    $.get("../Xuly/San_Pham.php", {page: 1, brand: "APPLE"}, function (data) {
                        $("#product_H").html(data);
                        if (data.length == 0)
                        {
                            $("#no_data").css("display", "block");
                            $("#xemthem_brand").css("display", "none");
                        } else {
                            $("#no_data").css("display", "none");
                            $("#xemthem_brand").css("display", "block");
                        }
                    });

                    var page_H = 1;
                    $("#xemthem_brand").click(function () {
                        page_H += 1;
                        $.get("../Xuly/San_Pham.php", {page: page_H, brand: "APPLE"}, function (data) {
                            $("#product_H").append(data);
                            if (data.length == 0)
                            {
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    });
                });


                //phan SAMSUNG
                $("#SAMSUNG").click(function () {
                    brand_ss = 'SAMSUNG';
                    $("#xemthem").css("display", "none");
                    $.get("../Xuly/San_Pham.php", {page: 1, brand: "SAMSUNG"}, function (data) {
                        $("#product_H").html(data);
                        if (data.length == 0)
                        {
                            $("#no_data").css("display", "block");
                            $("#xemthem_brand").css("display", "none");
                        } else {
                            $("#no_data").css("display", "none");
                            $("#xemthem_brand").css("display", "block");
                        }
                    });

                    var page_H = 1;
                    $("#xemthem_brand").click(function () {
                        page_H += 1;
                        $.get("../Xuly/San_Pham.php", {page: page_H, brand: "SAMSUNG"}, function (data) {
                            $("#product_H").append(data);
                            if (data.length == 0)
                            {
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    });
                });


                //phan HUAWEI
                $("#HUAWEI").click(function () {
                    brand_ss = 'HUAWEI';
                    $("#xemthem").css("display", "none");
                    $.get("../Xuly/San_Pham.php", {page: 1, brand: "HUAWEI"}, function (data) {
                        $("#product_H").html(data);
                        if (data.length == 0)
                        {
                            $("#no_data").css("display", "block");
                            $("#xemthem_brand").css("display", "none");
                        } else {
                            $("#no_data").css("display", "none");
                            $("#xemthem_brand").css("display", "block");
                        }
                    });

                    var page_H = 1;
                    $("#xemthem_brand").click(function () {
                        page_H += 1;
                        $.get("../Xuly/San_Pham.php", {page: page_H, brand: "HUAWEI"}, function (data) {
                            $("#product_H").append(data);
                            if (data.length == 0)
                            {
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    });
                });


                //phan SONY
                $("#SONY").click(function () {
                    brand_ss = 'SONY';
                    $("#xemthem").css("display", "none");
                    $.get("../Xuly/San_Pham.php", {page: 1, brand: "SONY"}, function (data) {
                        $("#product_H").html(data);
                        if (data.length == 0)
                        {
                            $("#no_data").css("display", "block");
                            $("#xemthem_brand").css("display", "none");
                        } else {
                            $("#no_data").css("display", "none");
                            $("#xemthem_brand").css("display", "block");
                        }
                    });

                    var page_H = 1;
                    $("#xemthem_brand").click(function () {
                        page_H += 1;
                        $.get("../Xuly/San_Pham.php", {page: page_H, brand: "SONY"}, function (data) {
                            $("#product_H").append(data);
                            if (data.length == 0)
                            {
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    });
                });

                //phần OPPO
                $("#OPPO").click(function () {
                    brand_ss = 'OPPO';
                    $("#xemthem").css("display", "none");
                    $.get("../Xuly/San_Pham.php", {page: 1, brand: "OPPO"}, function (data) {
                        $("#product_H").html(data);
                        if (data.length == 0)
                        {
                            $("#no_data").css("display", "block");
                            $("#xemthem_brand").css("display", "none");
                        } else {
                            $("#no_data").css("display", "none");
                            $("#xemthem_brand").css("display", "block");
                        }
                    });

                    var page_H = 1;
                    $("#xemthem_brand").click(function () {
                        page_H += 1;
                        $.get("../Xuly/San_Pham.php", {page: page_H, brand: "OPPO"}, function (data) {
                            $("#product_H").append(data);
                            if (data.length == 0)
                            {
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    });
                });

                //San pham bán chạy
                $("#SPBC").click(function () {
                    $("#xemthem_brand").css("display", "none");
                    $("#xemthem").css("display", "none");
                    if (brand_ss != null)
                    {
                        $.get("../Xuly/San_Pham.php", {page: 1, brand: brand_ss, SPBC: "h"}, function (data) {
                            $("#product_H").html(data);
                        });
                    }
                    if (brand_ss == null)
                    {
                        $.get("../Xuly/San_Pham.php", {page: 1, SPBC: "h"}, function (data) {
                            $("#product_H").html(data);
                        });
                    }
                });
                // Giá Tắng Dần
                $("#GTD").click(function () {
                    if (brand_ss != null)
                    {
                        $.get("../Xuly/San_Pham.php", {page: 1, brand: brand_ss, GTD: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    }
                    if (brand_ss == null)
                    {
                        $("#xemthem").css("display", "none");
                        $.get("../Xuly/San_Pham.php", {page: 1, GTD: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                        var page_H = 1;

                        $("#xemthem_brand").click(function () {
                            page_H += 1;
                            $.get("../Xuly/San_Pham.php", {page: page_H, GTD: "h"}, function (data) {
                                $("#product_H").append(data);
                                if (data.length == 0)
                                {
                                    $("#xemthem_brand").css("display", "none");
                                } else {
                                    $("#xemthem_brand").css("display", "block");
                                }
                            });
                        });
                    }
                });

                // Giá Giảm Dần
                $("#GGD").click(function () {
                    if (brand_ss != null)
                    {
                        $.get("../Xuly/San_Pham.php", {page: 1, brand: brand_ss, GGD: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    }
                    if (brand_ss == null)
                    {
                        $("#xemthem").css("display", "none");
                        $.get("../Xuly/San_Pham.php", {page: 1, GGD: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                        var page_H = 1;

                        $("#xemthem_brand").click(function () {
                            page_H += 1;
                            $.get("../Xuly/San_Pham.php", {page: page_H, GGD: "h"}, function (data) {
                                $("#product_H").append(data);
                                if (data.length == 0)
                                {
                                    $("#xemthem_brand").css("display", "none");
                                } else {
                                    $("#xemthem_brand").css("display", "block");
                                }
                            });
                        });
                    }
                });



                // Hiện thị mặc định
                $("#ALL").click(function () {
                    $("#xemthem").css("display", "none");

                    brand_ss = null;
                    $.get("../Xuly/San_Pham.php", {page: 1}, function (data) {
                        $("#product_H").html(data);
                        if (data.length == 0)
                        {
                            $("#xemthem_brand").css("display", "none");
                        } else {
                            $("#xemthem_brand").css("display", "block");
                        }
                    });
                    var page_H = 1;
                    $("#xemthem_brand").click(function () {
                        page_H += 1;
                        $.get("../Xuly/San_Pham.php", {page: page_H}, function (data) {
                            $("#product_H").append(data);
                            if (data.length == 0)
                            {
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    });
                });

                // Dưới 2 triệu
                $("#duoi-2-trieu").click(function () {
                    $("#xemthem").css("display", "none");
                    if (brand_ss != null)
                    {
                        $.get("../Xuly/San_Pham.php", {page: 1, brand: brand_ss, duoi_2_trieu: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    }
                    if (brand_ss == null)
                    {
                        $("#xemthem").css("display", "none");
                        $.get("../Xuly/San_Pham.php", {page: 1, duoi_2_trieu: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                        var page_H = 1;

                        $("#xemthem_brand").click(function () {
                            page_H += 1;
                            $.get("../Xuly/San_Pham.php", {page: page_H, duoi_2_trieu: "h"}, function (data) {
                                $("#product_H").append(data);
                                if (data.length == 0)
                                {
                                    $("#xemthem_brand").css("display", "none");
                                } else {
                                    $("#xemthem_brand").css("display", "block");
                                }
                            });
                        });
                    }
                });

                // Từ 2 đến 4 trieu
                $("#tu-2-4-trieu").click(function () {
                    $("#xemthem").css("display", "none");
                    if (brand_ss != null)
                    {
                        $.get("../Xuly/San_Pham.php", {page: 1, brand: brand_ss, tu_2_4_trieu: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    }
                    if (brand_ss == null)
                    {
                        $("#xemthem").css("display", "none");
                        $.get("../Xuly/San_Pham.php", {page: 1, tu_2_4_trieu: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                        var page_H = 1;

                        $("#xemthem_brand").click(function () {
                            page_H += 1;
                            $.get("../Xuly/San_Pham.php", {page: page_H, tu_2_4_trieu: "h"}, function (data) {
                                $("#product_H").append(data);
                                if (data.length == 0)
                                {
                                    $("#xemthem_brand").css("display", "none");
                                } else {
                                    $("#xemthem_brand").css("display", "block");
                                }
                            });
                        });
                    }
                });

                //tu-4-7-trieu
                $("#tu-4-7-trieu").click(function () {
                    $("#xemthem").css("display", "none");
                    if (brand_ss != null)
                    {
                        $.get("../Xuly/San_Pham.php", {page: 1, brand: brand_ss, tu_4_7_trieu: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    }
                    if (brand_ss == null)
                    {
                        $("#xemthem").css("display", "none");
                        $.get("../Xuly/San_Pham.php", {page: 1, tu_4_7_trieu: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                        var page_H = 1;

                        $("#xemthem_brand").click(function () {
                            page_H += 1;
                            $.get("../Xuly/San_Pham.php", {page: page_H, tu_4_7_trieu: "h"}, function (data) {
                                $("#product_H").append(data);
                                if (data.length == 0)
                                {
                                    $("#xemthem_brand").css("display", "none");
                                } else {
                                    $("#xemthem_brand").css("display", "block");
                                }
                            });
                        });
                    }
                });


                //tu-7-13-trieu
                $("#tu-7-13-trieu").click(function () {
                    $("#xemthem").css("display", "none");
                    if (brand_ss != null)
                    {
                        $.get("../Xuly/San_Pham.php", {page: 1, brand: brand_ss, tu_7_13_trieu: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    }
                    if (brand_ss == null)
                    {
                        $("#xemthem").css("display", "none");
                        $.get("../Xuly/San_Pham.php", {page: 1, tu_7_13_trieu: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                        var page_H = 1;

                        $("#xemthem_brand").click(function () {
                            page_H += 1;
                            $.get("../Xuly/San_Pham.php", {page: page_H, tu_7_13_trieu: "h"}, function (data) {
                                $("#product_H").append(data);
                                if (data.length == 0)
                                {
                                    $("#xemthem_brand").css("display", "none");
                                } else {
                                    $("#xemthem_brand").css("display", "block");
                                }
                            });
                        });
                    }
                });


                //tu-7-13-trieu
                $("#tren-13-trieu").click(function () {
                    $("#xemthem").css("display", "none");
                    if (brand_ss != null)
                    {
                        $.get("../Xuly/San_Pham.php", {page: 1, brand: brand_ss, tren_13_trieu: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                    }
                    if (brand_ss == null)
                    {
                        $("#xemthem").css("display", "none");
                        $.get("../Xuly/San_Pham.php", {page: 1, tren_13_trieu: "h"}, function (data) {
                            $("#product_H").html(data);
                            if (data.length == 0)
                            {
                                $("#no_data").css("display", "block");
                                $("#xemthem_brand").css("display", "none");
                            } else {
                                $("#no_data").css("display", "none");
                                $("#xemthem_brand").css("display", "block");
                            }
                        });
                        var page_H = 1;

                        $("#xemthem_brand").click(function () {
                            page_H += 1;
                            $.get("../Xuly/San_Pham.php", {page: page_H, tren_13_trieu: "h"}, function (data) {
                                $("#product_H").append(data);
                                if (data.length == 0)
                                {
                                    $("#xemthem_brand").css("display", "none");
                                } else {
                                    $("#xemthem_brand").css("display", "block");
                                }
                            });
                        });
                    }
                });
                $.get("../Xuly/cart.php", function (data) {
                    $("#count_cart").html(data);
                });
                $("*").change(function () {
                    $.get("../Xuly/cart.php", function (data) {
                        $("#count_cart").html(data);
                    });

                });


                $("#search").keyup(function () {
                    var name_product = $(this).val();
                    $.get("searchProduct.php", {name_pro: name_product}, function (data) {
                        $("#myUL").html(data);
                    });
                });
                $("#hien").mouseover(function () {
                    $("#myUL").css("display", "block");
                });
                $("#hien").mouseout(function () {
                    $("#myUL").css("display", "none");
                });
            });

        </script>



    </head>
    <body id="txtHint" >
        <!--phần menu-->
        <div class="above-nav">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <p>PHPMOBILE@GMAIL.COM - Hotline:1900 9090</p>
                    </div>
                    <div class="col-sm-3 <?php
                    if ($activeMenu == 'taikhoan') {
                        echo 'active';
                    }
                    ?>">

                        <?php
                        if (isset($_SESSION["username"])) {
                            ?>
                            <div id="logout" style="padding-top: 4%;">
                                <i class="glyphicon glyphicon-user" style="font-size: 18px; margin-left: -15%; color:#f1f5f7 !important;"></i>
                                <a href="../Code/Thongtintaikhoan.php" style="margin-left: -10%; color: white;  font-size: 14px;">
                                    <?php
                                    echo "Chào " . $_SESSION["username"];
                                    ?>

                                </a>
                                <a style="color: white;">
                                    <?php
                                    echo "|"
                                    ?>
                                </a>
                                <a href="../Code/Quanlytaikhoan.php" style="padding-left: 2%; color: white;  font-size: 14px;">
                                    <?php
                                    echo "Đơn hàng";
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
                                 src="../Images/phpmobile.jpg" usemap="#Map" border="0">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-right" id="navbar-menu">


                            <li class="<?php
                            if ($activeMenu == 'home') {
                                echo 'active';
                            }
                            ?>">
                                <a href="Home.php">Trang Chủ </a>

                            </li>
                            <li class="<?php
                            if ($activeMenu == 'GioiThieu') {
                                echo 'active';
                            }
                            ?>">
                                <a href="GioiThieu.php">Giới Thiệu</a>
                            </li>
                            <li class="<?php
                            if ($activeMenu == 'LienHe') {
                                echo 'active';
                            }
                            ?>">
                                <a href="LienHe.php">Liên Hệ</a>
                            </li>

                            <li>
                                <form action="" class="search-form">
                                    <div class="form-group has-feedback">
                                        <div id="hien">
                                            <label for="search" class="sr-only">Search</label> <!-- ??????????????????????????????????????? -->
                                            <input type="text" autocomplete="off" class="form-control" id="search"  placeholder="search" id="myInput" oninput="myFunction()" title="Type in a name" >
                                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                            <ul id="myUL" >

                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="<?php
                            if ($activeMenu == 'cart') {
                                echo 'active';
                            }
                            ?>">
                                <a href="giohang.php">
                                    <button class="cart-form-button" id="cart">
                                        <span class="glyphicon glyphicon-shopping-cart" style="font-size: 18px;"></span>
                                    </button>
                                    <span id="count_cart" class="cart-item-quality"> <!-- Hiển Thị Số Lượng Hàng trong Giỏ --></span>
                                </a>


                            </li>


                        </ul>

                    </div>
                </div><!-- /.container-fluid -->

            </nav>

        </div>

        <hr style="opacity: 0.0; margin-top: -1%;"/>   
        <div style="background-color: #fff">


