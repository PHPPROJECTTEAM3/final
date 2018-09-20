<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once './HeaderAdmin.php';

?>

        <h2>Add Versions</h2>
        <p><a href="admin_manage_version.php">Back to Manage Versions</a></p><hr/>
        <form>
            <p>Name Version</p>
            <input name="name_ver" type="text" maxlenght="30" required>
            <p>Logo</p>
            <input name="file_ver" type="file"><br/><br/>
            <input class="btn btn-success" name="bt_add_pro" type="submit" value="Add">
        </form>
        <?php
        include_once '../../PRJ_Library/connect_DB.php';
        if (isset($_GET["bt_add_pro"])) {
            $name = $_GET["name_ver"];
            $file = $_GET["file_ver"];

            $query = "INSERT INTO `version`(`ver_code`, `File_PDF`) VALUES ('$name','$file')";
            $result = mysqli_query($link, $query);

            if (!$result) {
                die("Add Faile !!!");
            } else {
                header("location:admin_manage_version.php"); 
                mysqli_close($link);
                 exit();
            }
        }
        ?>
    </body>
</html>