<?php
ob_start();
include_once '../../PRJ_Library/connect_DB.php';
include_once '../quanly_admin/HeaderAdmin.php';
session_start();

if (!isset($_GET["id"])){
    header("Location:Addadvertise.php");
    exit();
}
$ID = $_GET["id"];
$query = "SELECT * FROM advertise WHERE id_adv = $ID";
$result = mysqli_query($link, $query);
$col = mysqli_fetch_array($result);
?>

        <form method="POST">
            ID: <?php echo $col['id_adv']; ?><br/>
            Name: <?php echo $col['name_adv'];?><br/>
            Quảng Cáo: <input  name="advertise" type="file"><br/><br/>
            
            <input type="submit" name="btnSubmit">
            <a href="Addadvertise.php">Quay về</a>
        </form>
        
        <?php
        if (isset($_POST["btnSubmit"])){
            $advertise = $_POST["advertise"];
            $query1 = "UPDATE advertise SET img_adv = '$advertise' WHERE id_adv = $ID";
            if($result1 = mysqli_query($link, $query1)){
                header("Location:Addadvertise.php");
            exit();
            }
            else{
                echo "Thay đổi thất bại!";
                exit();
            }
                
        }
        ?>
    </body>
</html>
