<?php
ob_start();
include_once '../../PRJ_Library/connect_DB.php';
include_once '../quanly_admin/HeaderAdmin.php';
session_start();

if (!isset($_GET["id"])){
    header("Location:Adduser.php");
    exit();
}
$ID = $_GET["id"];
$query = "SELECT * FROM admin WHERE id = $ID";
$result = mysqli_query($link, $query);
$col = mysqli_fetch_array($result);
?>


        <form method="POST">
            ID: <input name="roleid" readonly value="<?php echo $col['id']; ?>"><br/>
            
            Quyền Truy Cập Hiện Tại: <input name="cur_role" readonly value="<?php echo $col['role']; ?>"><br/>
            Quyền Truy Cập Mới: <input name="new_role" value=""><br/>
            <input type="submit" name="btnSubmit">
            <a href="Adduser.php">Quay về</a>
        </form>
        
        <?php
        if (isset($_POST["btnSubmit"])){
            $new_role = $_POST["new_role"];
            $query1 = "UPDATE admin SET role = '$new_role' WHERE id = $ID";
            if($result1 = mysqli_query($link, $query1)){
                header("Location:Adduser.php");
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
