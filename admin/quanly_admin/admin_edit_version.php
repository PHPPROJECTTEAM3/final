<?php
include_once './HeaderAdmin.php';
if(!(isset($_GET["id"])))
{
    header("location:admin_manage_version.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
$id= $_GET["id"];
$query = "SELECT * FROM `version` Where ver_code ='$id'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No Data");
}

$row = mysqli_fetch_array($result);

?>


       <h2>Edit Version</h2>
             <div style="overflow: hidden">
                <div style="float: left"> 
                    <a href="admin_manage_version.php" style="text-decoration: none" >Back to Manage Version</a>
            </div>
                <div style="float: right; margin-right: 20px">
                    <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
                </div> 
            </div>
            <hr/>   
        <form method="get" action="edit_version.php">
            <p>Current Version Name</p>
            <p><input type="text" readonly value="<?php echo $row[0] ;?>"  name="current_version"></p>
            <p>New Version Name</p>
            <p><input type="text" name="new_version" maxlength="30"></p>
            <p>File PDF</p>
            <p>---Current File <input name="current_file" type="text" value="<?php echo $row[1]?>">
            <p>---New File <input name="new_file" type="file"> <!--Có Thể Để Trống -->
            <p><input class="btn btn-success" name="bt_edit" type="submit" value="Edit">
        </form>
        
    </body>
</html>
