<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}
include_once './HeaderAdmin.php';
 $id = 0;
if(isset($_GET["id"]))
{
   $id = $_GET["id"];
}

 if(!isset($_SESSION["invoice"]))
    {
       header("location:admin_manage_invoice.php");
       exit();
    }

include_once '../../PRJ_Library/connect_DB.php';

$invoice = $_SESSION["invoice"] ;
$query="SELECT `ID_Pro`,`Name_pro`,`Quantity_pro`,`price_pro` FROM `detail_invoice` WHERE `ID_Invoice` =$invoice AND `ID_Pro` =$id";
$result= mysqli_query($link, $query);
$col = mysqli_fetch_array($result);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="../blue/style2.css" rel="stylesheet" type="text/css"/>
        <div class="margin5px">
<h2>Edit Quantity Product In Invoice <?php echo $invoice ?></h2>
 <div style="overflow: hidden">
                <div style="float: left"> 
                    <a href="admin_detail_invoice.php" style="text-decoration: none" >Back to Detail Invoice</a>
            </div>
                <div style="float: right; margin-right: 20px">
                    <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
                </div> 
            </div>
 <hr/>
 <form method="GET">
     <p>ID Product : <?php echo $col[0] ?></p>
     <p>Name Product : <?php echo $col[1] ?></p> 
    <p><input name="quantity_edit" type="number" value="<?php echo $col[2] ?>" required max="3" min="1"  ></p>
    <input type="submit" name="bt_edit" value="Edit" class="btn btn-success">   
    <input name="id_pro" type="hidden" value="<?php echo $col[0] ?>">
    <input name="price_pro" type="hidden" value="<?php echo $col[3] ?>">
</form>
 
 
  <?php 
if(isset($_GET["bt_edit"]))
{    
   $price_pro = $_GET["price_pro"];
    $quantity_edit = $_GET["quantity_edit"];
    $total = ($price_pro*$quantity_edit);
    $id_pro = $_GET["id_pro"];
    
    $query2 = "UPDATE `detail_invoice` SET `Quantity_pro`=$quantity_edit, `total`=$total WHERE `ID_Invoice` = $invoice AND `ID_Pro` = $id_pro   ";
    $result2 = mysqli_query($link, $query2);
    if($result2)
    {
        header("location:admin_detail_invoice.php");
        mysqli_close($link);
        exit();
    } else {
        echo 'Edit Faile !!!';      
    }
    
}

if(!isset($_GET["id"]))
{
   echo "<h4>ID not Exist !!!</h4>";
}

mysqli_close($link);
        exit();
 ?>
        </div>