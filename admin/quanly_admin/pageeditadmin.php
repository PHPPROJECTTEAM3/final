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
            ID: <?php echo $col['id']; ?><br/>
            
            Quyền Truy Cập Hiện Tại: <?php echo $col['role']; ?><br/>
            <select class="fed" name="new_role">
                        <option>Cấp Quyền</option>
                        <option>1</option>
                        <option>2</option>                        
                    </select><br/><br/>
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
                echo "Thay đổi thất mại!";
                exit();
            }
                
        }
        ?>
    </body>
</html>
