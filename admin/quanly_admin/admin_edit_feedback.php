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
                <a href="mailto:<?php echo $col7[0] ?>?Subject=Hello" target="_blank"><strong style="position: absolute; margin-left: 49%;margin-top: -8%">Mail</strong></a> </div>
            <p><input name="bt_edit" type="submit" value="Edit"></p>
        </form>
