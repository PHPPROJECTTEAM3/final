<?php
ob_start();
include_once '../../PRJ_Library/connect_DB.php';
include_once '../quanly_admin/HeaderAdmin.php';
session_start();

if (!isset($_GET["id"])){
    header("Location:Addmember.php");
    exit();
}
$ID = $_GET["id"];
$query = "SELECT * FROM member WHERE id = $ID";
$result = mysqli_query($link, $query);
$col = mysqli_fetch_array($result);
?>

        <form method="POST">
            ID: <input name="reliability" readonly value="<?php echo $col['id']; ?>"><br/>
            
            Độ tin cậy hiện tại: <input name="cur_reliability" readonly value="<?php echo $col['reliability']; ?>"><br/>
            Độ tin cậy mới: <input name="reliability" value=""><br/>
            <input type="submit" name="btnSubmit">
            <a href="Addmember.php">Quay về</a>
        </form>
        
        <?php
        if (isset($_POST["btnSubmit"])){
            $new_reliability = $_POST["reliability"];
            $query1 = "UPDATE member SET reliability = '$new_reliability' WHERE id = $ID";
            if($result1 = mysqli_query($link, $query1)){
                header("Location:Addmember.php");
            exit();
            }
            else{
                echo $query1;
                exit();
            }
                
        }
        ?>
    </body>
</html>
