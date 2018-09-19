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
                $("#xemthem_brand").css("display", "none")
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
                    if (brand_ss != null)
                    {
                        $.get("../Xuly/San_Pham.php", {page: 1, brand: brand_ss, SPBC: "h"}, function (data) {
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
                        $.get("../Xuly/San_Pham.php", {page: 1, SPBC: "h"}, function (data) {
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

                            $.get("../Xuly/San_Pham.php", {page: page_H, SPBC: "h"}, function (data) {
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



//                // Hiện thị mặc định
//                $("#ALL").click(function () {
//                    $("#xemthem").css("display", "none");
//                    $("#xemthem_brand").css("display", "none");
//                    
//                    brand_ss = null;
//                    alert(brand_ss);
//                    $.get("../Xuly/San_Pham.php", {page: 1}, function (data) {
//                        $("#product_H").html(data);
//                        if (data.length == 0)
//                                {
//                                    $("#xemthem_default").css("display", "none");
//                                } else {
//                                    $("#xemthem_default").css("display", "block");
//                                }
//                    });
//                    var page_H = 1;                  
//                    $("#xemthem_default").click(function () {
//                        page_H += 1;
//
//                        $.get("../Xuly/San_Pham.php", {page: page_H}, function (data) {
//                            $("#product_H").append(data);
//                            if (data.length == 0)
//                                {
//                                    $("#xemthem_brand").css("display", "none");
//                                } else {
//                                    $("#xemthem_brand").css("display", "block");
//                                }
//                        });
//                    });
//                });

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
                                <i class="glyphicon glyphicon-user" style="font-size: 18px;"></i>
                                <a href="quanlytaikhoan.php" style="padding-left: 8%; color: white;">
                                    <?php
                                    echo "Chào " . $_SESSION["username"];
                                    ?>

                                </a>
                                <a style="color: white;">
                                    <?php
                                    echo "|"
                                    ?>
                                </a>
                                <a id="bt_logout" name="bt_logout" href="log_out_user.php" style="padding-left: 1%; color: white;">Đăng Xuất</a>

                            </div>
                            <?php
                        } else {
                            ?>
                            <div href="" onclick="document.getElementById('modal-wrapper').style.display = 'block'">
                                <i class="glyphicon glyphicon-user" style="font-size: 18px;"></i>
                                <div style="padding-top: 4%; padding-left: 9%; color: white;">
                                    Tài Khoản
                                </div>
                            </div>
                            <?php
                        }
                        ?>



                        <!--loginuser-->


                        <!--formloginuser-->
                        <div id="modal-wrapper" class="modal">

                            <form class="modalsign-content animatesign" style="width: 60%">

                                <div class="imgcontainer">
                                    <span onclick="document.getElementById('modal-wrapper').style.display = 'none'" class="close" title="Close PopUp">&times;</span>
                                    <div class="login-wrap">
                                        <div class="login-html">
                                            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ðăng Nhập</label>
                                            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Ðăng Ký</label>
                                            <form class="modalsign-content animatesign"></form>
                                            <div class="login-form">
                                                <form class="login" action="../Code/signIn_User.php" method="POST">
                                                    <div class="sign-in-htm">
                                                        <div class="group">
                                                            <label for="user" class="label">Tên Ðăng Nhập</label>
                                                            <input id="user" type="text" class="input" required maxlength="15" name="user_si">
                                                        </div>
                                                        <div class="group">
                                                            <label for="pass" class="label">Mật Khẩu</label>
                                                            <input id="pass" type="password" class="input" data-type="password" required maxlength="15" name="pass_si">
                                                        </div>
                                                        <div class="group">
                                                            <input id="check" type="checkbox" class="check" checked>
                                                            <label for="check"><span class="icon"></span>Ghi Nhớ Tài Khoản</label>
                                                        </div>
                                                        <div class="group">
                                                            <input type="submit" class="button" value="Ðăng Nhập" name="bt_signIn">
                                                        </div>
                                                        <div class="hr"></div>
                                                        <div class="foot-lnk">
                                                            <a href="#forgot">Quên Mật Khẩu</a>
                                                        </div>
                                                    </div>
                                                </form>

                                                <form class="formreg" onSubmit="return validate();" action="../Code/signUp_user.php" method="POST">
                                                    <div class="sign-up-htm">
                                                        <div class="group">
                                                            <label for="user" class="label">Tên Ðăng Nhập</label>
                                                            <input id="user" type="text" class="input" required name="username" maxlength="15">
                                                        </div>
                                                        <div class="group">
                                                            <label for="pass" class="label">Mật Khẩu</label>
                                                            <input id="su_pass" type="password" class="input" data-type="password" required name="password" maxlength="15">
                                                        </div>
                                                        <div class="group">
                                                            <label for="pass" class="label">Xác Nhận Mật Khẩu</label>
                                                            <input id="su_cfpass" type="password" class="input" data-type="password" required maxlength="15">
                                                            <span id='message'></span>
                                                        </div>
                                                        <div class="group">
                                                            <label for="pass" class="label">Ðịa Chỉ Email</label>
                                                            <input id="pass" type="email" class="input" required name="email" maxlength="50">
                                                        </div>
                                                        <div class="group">
                                                            <input type="submit" class="button" value="Ðăng Ký" name="bt_signIn">
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!--formloginuser-->

                        <!--loginuser-->
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
                                 src="../Images/Thegioididong-icon.png" usemap="#Map" border="0">
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
                                            <input type="text" class="form-control" name="search"  placeholder="search" id="myInput" oninput="myFunction()" title="Type in a name" >
                                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                            <ul id="myUL" >
                                                <div id="hien2">
                                                    <?php
                                                    $queryH2 = "SELECT  `ID`,`name`,`name_brand`,`img` FROM `product` ORDER BY `L_Date` DESC";
                                                    $resultH2 = mysqli_query($link, $queryH2);
                                                    $queryH3 = "SELECT `name` FROM `brand`";
                                                    $resultH3 = mysqli_query($link, $queryH3);
                                                    $name_brand_H = NULL;
                                                    while ($colH2 = mysqli_fetch_array($resultH2)) {
                                                        echo "<li><a href='Thongtinsanpham.php?ID=$colH2[0]'>$colH2[1]<p style='display: none;'>$colH2[2]</p></a><img src='../../PHP_Team3_HK2/Images/$colH2[2]/$colH2[3]' width='50px'></li>";
                                                    }
                                                    ?>
                                                </div>
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


