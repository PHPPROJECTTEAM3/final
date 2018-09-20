<?php
include_once './HeaderAdmin.php';

if(!(isset($_GET["id"])))
{
    header("location:admin_manage_brand.php");
    exit();
}
include_once '../../PRJ_Library/connect_DB.php';
$id= $_GET["id"];
$query = "SELECT * FROM `brand` Where name ='$id'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No Data");
}

$row = mysqli_fetch_array($result);

?>


      
        <h2>Edit Brand</h2>
             <div style="overflow: hidden">
                <div style="float: left"> 
                    <a href="admin_manage_brand.php" style="text-decoration: none" >Back to Manage Brand</a>
            </div>
                <div style="float: right; margin-right: 20px">
                    <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
                </div> 
            </div>
            <hr/>   
        
        <form method="get" action="edit.php">
            <p>Current Name Brand</p>
            <p><input type="text" readonly value="<?php echo $row[0] ;?>"  name="current_name"></p>
            <p>New Name Brand</p>
            <p><input type="text" name="new_name" maxlength="15"></p>
            
            <p>---Current Logo <img src="<?php echo "../../Images/Brand/$row[1]" ?>" width=300px height=200px> <input name="current_image" type="hidden" value="<?php echo $row[1]?>">
            <p>---New Logo <input name="new_logo" type="file"> <!--Có Thể Để Trống -->
            <p><input class="btn btn-success" name="bt_edit" type="submit" value="Edit">
        </form>
        <?php 
mysqli_close($link);
exit();
?>
    </body>
</html>
