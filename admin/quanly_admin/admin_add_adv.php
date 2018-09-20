<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once './HeaderAdmin.php';

?>

        <h2>Add Brand</h2><hr/>
        <form>
            <p>Name</p>
            <input name="name_adv" type="text">
            <p>Logo</p>
            <input  name="img_adv" type="file"><br/><br/>
            <input class="btn btn-success" name="bt_add_pro" type="submit" value="Add">
        </form>
        <?php
        include_once '../../PRJ_Library/connect_DB.php';
        if (isset($_GET["bt_add_pro"])) {
            $name = $_GET["name_adv"];
            $img = $_GET["img_adv"];
            $query = "INSERT INTO `advertise`(`name_adv`, `img_adv`) VALUES ('$name','$img')";
            $result = mysqli_query($link, $query);

            if (!$result) {
                die("Add Faile !!!");
            } else {
                header("location:Addadvertise.php");
                exit();
            }
        }
        ?>
        <p><a href="Addadvertise.php">Quay về</a></p>
        <?php 
mysqli_close($link);
exit();
?>
    </body>
</html>
