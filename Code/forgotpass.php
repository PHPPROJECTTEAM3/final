<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../PHPMailer/PHPMailer.php";
require_once "../PHPMailer/Exception.php";
require_once "../PHPMailer/SMTP.php";
require_once 'functions.php';

if (isset($_POST['email'])) {
    $link = mysqli_connect('localhost', 'root', '', 'php_project_ver2');

    $email = $link->real_escape_string($_POST['email']);

    $query = "SELECT id FROM member WHERE mail = '$email'";
    $result = mysqli_query($link, $query);
//     exit(json_encode(array("status" => 0, "msg" => $result)));
    if (mysqli_num_rows($result) > 0) {

        $token = generateNewString();

        $query1 = "UPDATE member SET token = '$token',"
                . " tokenExpire=DATE_ADD(NOW(),"
                . " INTERVAL 5 MINUTE)"
                . "WHERE mail='$email'";
        $result1 = mysqli_query($link, $query1);

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'tungla7777@gmail.com';                 // SMTP username
            $mail->Password = '1234Abcd';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('PHPMOBILE@gmail.com', 'PHPMobile');
            $mail->addAddress("$email");


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Password';
            $mail->Body = ""
                    . "Xin Chào, <br><br>"
                    . "Để đổi lại mật khẩu vui lòng bấm vào link bên dưới. <br>"
                    . "<a href='"
                    . "http://localhost:8080/MyCode_PRJ/MyCode/resetpass.php?email=$email&token=$token"
                    . "'>http://localhost:8080/MyCode_PRJ/MyCode/resetpass.php</a><br><br>"
                    . "Trân trọng,<br>"
                    . "PHPMOBILE.";

            $mail->send();
            echo(json_encode(array("status" => 1, "msg" => ' Đã xãy ra lỗi! Vui lòng kiểm tra lại email đã nhập')));
            //exit(json_encode(array("status" => 1, "msg" => 'Vui lòng kiểm tra tin nhắn Email.')));
            
        } catch (Exception $e) {
            exit(json_encode(array("status" => 0, "msg" => ' Đã xãy ra lỗi! Vui lòng kiểm tra lại email đã nhập')));
        }
    } else
        exit(json_encode(array("status" => 0, "msg" => 'Vui lòng kiểm tra lại email đã nhập')));
}
?>

    <?php
$pageTitle = "Quên Mật Khẩu";
$activeMenu = "";
include_once '../PRJ_Library/header.php';
?>
<div style="margin-top: 5%; margin-bottom: 5%;">
                    <div class="header">
                         <h2>Quên Mật Khẩu</h2>
                    </div> 
        <div class="sign-in-html">
                    <p id="response" style="font-size: 18px;"></p>
                    <div class="groupacc">
                    <input class="form-control" id="email" placeholder="Nhập email của bạn"/><br/>
                    </div>
                    <div class="groupacc">
                    <input type="button" class="btn btn-primary" value="Đổi Mật Khẩu">
                    </div>
                    <div class="hr"></div>
            <div class="foot-lnk">
                <a href="Home.php">Trang Chủ</a>
            </div>
        </div>
</div>


<?php
include_once '../PRJ_Library/footer.html';
?>        

        <script type="text/javascript">
            var email = $("#email");


            $(document).ready(function () {
                $(".btn-primary").on('click', function () {
                    if (email.val() != "") {
                        email.css('border', '1px solid green');

                        $.ajax({
                            url: 'forgotpass.php',
                            method: 'POST',
                            //contentType: "application/json",
                            dataType: 'json',
                            data: {
                                email: email.val()
                            }, success: function (response) {
                                console.log(response);
                                if (!response.success)
                                    $("#response").html(response.msg).css('color', "red");
                                else
                                    $("#response").html(response.msg).css('color', "green");

                            }, error: function (xhr, ajaxOptions, thrownError) {
                                
                                if(xhr.status == 200){
                                    $("#response").html("Vui lòng kiểm tra mail của bạn").css('color', "green");
                                };
                            }
                        });
                    } else
                        email.css('border', '1px solid red');
                });
            });
        </script>
    </body>
</html>
