<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "../../PHPMailer/PHPMailer.php";
require_once "../../PHPMailer/Exception.php";
require_once "../../PHPMailer/SMTP.php";


if (isset($_POST['mail'])) {
     exit(json_encode(array("status" => 1, "msg" => ' Vui lòng kiểm tra email của bạn')));
    $link = mysqli_connect('localhost', 'root', '', 'php_project_ver2');

    $email = $link->real_escape_string($_POST['email']);

    $query11 = "SELECT acc FROM member WHERE mail = '$email'";
    $result11 = mysqli_query($link, $query);
//     exit(json_encode(array("status" => 0, "msg" => $result)));
    exit(json_encode(array("status" => 1, "msg" => ' Vui lòng kiểm tra email của bạn')));
    if (mysqli_num_rows($result11) > 0) {


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
                    . "http://localhost:8080/Final/Code/resetpass.php?email=$email&token=$token"
                    . "'>http://localhost:8080/MyCode_PRJ/MyCode/resetpass.php</a><br><br>"
                    . "Trân trọng,<br>"
                    . "PHPMOBILE.";

            $mail->send();
            exit(json_encode(array("status" => 1, "msg" => ' Vui lòng kiểm tra email của bạn')));
            //exit(json_encode(array("status" => 1, "msg" => 'Vui lòng kiểm tra tin nhắn Email.')));
            
        } catch (Exception $e) {
            exit(json_encode(array("status" => 0, "msg" => ' Đã xãy ra lỗi! Vui lòng kiểm tra lại email đã nhập')));
        }
    } else
        exit(json_encode(array("status" => 0, "msg" => 'Vui lòng kiểm tra lại email đã nhập')));
}
?>
<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once './HeaderAdmin.php';
if(!(isset($_GET["id"])))
{
    header("location:admin_manage_feedback.php");
    exit();
    
}
include_once '../../PRJ_Library/connect_DB.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$id= $_GET["id"];
$query = "SELECT * FROM `feed_back` WHERE `id`='$id'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No Data");
}
$query2 = "SELECT * from admin";
$result2 = mysqli_query($link, $query2);
$row = mysqli_fetch_array($result);
//$query3 = "SELECT * from 'feed_back'";
//$result3 = mysqli_query($link, $query3);

?>
 <h2>Edit </h2>
 
             <div style="overflow: hidden">
                <div style="float: left"> 
                    <a href="admin_manage_feedback.php" style="text-decoration: none" >Back </a>
            </div>
                <div style="float: right; margin-right: 20px">
                    
                </div> 
            </div>
            <hr/>   
            <form method="get" action="admin_edit_feedback_php.php">
            <p>ID: <?php echo $row[0] ?> </p>
            <input type="hidden" name="id_feed" value="<?php echo $row[0] ?>">
                   
                   <p>Account:
                <?php 
               
                
                echo $row[1]; 
                ?> 
            </p>
            <p>Content Feedback<br/> <textarea cols=80" rows="8" readonly><?php echo $row[2] ?></textarea></p>
            <p>Date Feedback: <?php echo $row[3] ?></p>
            <p>Content Reply<br/> <textarea cols=80" rows="8" name="conrep"><?php echo $row[4] ?></textarea></p>
            <p>Date Reply: <input name="date_rep"  value="<?php echo date("Y-m-d - H:i:s"); ?>"   readonly></p> 
            <p>Admin Reply:</p>
                <select name="addmin_rep">
                    
                    <?php
                    while ($row1 = mysqli_fetch_array($result2))
                    {
                        echo "<option value='$row1[1]' >$row1[1]</option>";
                    }
                    ?>
                </select>
            <div>
            <?php 
            $query7 = "select mail from member where acc like '$row[1]'";
            $result7 = mysqli_query($link, $query7);
            $col7 = mysqli_fetch_array($result7);
            ?>
<!--                <a href="mailto:<?php echo $col7[0] ?>?Subject=Hello" target="_blank"><strong style="position: absolute; margin-left: 49%;margin-top: -8%">Mail</strong></a> </div>-->
                <p id="response" style="font-size: 18px;"></p>
                  
                <input class="form-control" style="width: 20%;" id="email" value="<?php echo $col7["mail"] ?>" placeholder="Nhập email của bạn"/><br/>
             
               
                    <input type="button" class="btn btn-primary" id="btnSubmit" value="Thông Báo">
             
                
            <p><input name="bt_edit" type="submit" value="Edit"></p>
        </form>
            
              
</body>
</html>

<script type="text/javascript">
            var email = $("#email");
            $(document).ready(function () {
                $('#btnSubmit').click(function(){
                    //Some code
                    if (email.val() != "") {
                        email.css('border', '1px solid green');

                        $.ajax({
                            url: 'admin_edit_feedback.php',
                            method: 'POST',
                            dataType: 'json',
                            data: {
                                mail: "tunglamt0202@gmail.com"
                            }, success: function (response) {
                                console.log(response);
                                if (!response.success)
                                    $("#response").html(response.msg).css('color', "red");
                                else
                                    $("#response").html(response.msg).css('color', "green");

                            }, error: function (xhr, ajaxOptions, thrownError) {
                                
                                if(xhr.status == 200){
                                    console.log(xhr);
                                    console.log(thrownError);
                                    $("#response").html("Đã gửi email").css('color', "green");
                                };
                            }
                        });
                    } else
                        email.css('border', '1px solid red');
                });

            });
        </script>