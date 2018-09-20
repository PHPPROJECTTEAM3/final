<?php
session_start();
if (!(isset($_SESSION["admin"]) && isset($_SESSION["role"]))) {
    header("location:Login.php");
    exit();
}

include_once '../quanly_admin/HeaderAdmin.php';
$activeMenu = "sodo";

?>
<div style="overflow: hidden">
    <div style="float: left"> 
        <h2>Sơ Đồ Thống Kê 2018</h2>
    </div>
    <div style="float: right; margin-right: 20px">
        <a href="admin_log_out.php" style="text-decoration: none;">Log Out</a>
    </div> 
</div>
       <div id="chartMember" style="height: 370px; width: 100%; margin-top: 1%;margin-bottom: 3%;"></div>
    <div id="chartProduct" style="height: 370px; width: 100%; margin-bottom: 3%;"></div>
    <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
</div>
    </div>
    
    <?php

             include_once '../../PRJ_Library/connect_DB.php';

 
//member
$dataMember = array();
$dataProduct = array();
$dataPoints = array();

//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database

    $query1="SELECT Count(*) as count, Month(Date) as month FROM   member WHERE YEAR(Date) = YEAR(CURDATE()) GROUP  BY Month(Date)";
//    $handle = $link->prepare($query); 
//    $handle->execute(); 
//    $result = $handle->fetchAll();
    $result1= mysqli_query($link, $query1);
    
    foreach($result1 as $row1){
//       var_dump($row);
        
        array_push($dataMember, array("x"=> "$row1[month]", "y"=> "$row1[count]"));
    }
//    die;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}



//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database

    $query="SELECT Count(*) as count, Month(L_Date) as month FROM   product WHERE YEAR(L_Date) = YEAR(CURDATE()) GROUP  BY Month(L_Date)";
//    $handle = $link->prepare($query); 
//    $handle->execute(); 
//    $result = $handle->fetchAll();
    $result= mysqli_query($link, $query);
    
    foreach($result as $row){
//        var_dump($row);
        
        array_push($dataProduct, array("x"=> "$row[month]", "y"=> "$row[count]"));
    }
//    die;
	
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database

    $query2="SELECT Count(*) as count, Month(Date_Re) as month FROM   invoice WHERE YEAR(Date_Re) = YEAR(CURDATE()) GROUP  BY Month(Date_Re)";
//    $handle = $link->prepare($query); 
//    $handle->execute(); 
//    $result = $handle->fetchAll();
    $result2= mysqli_query($link, $query2);
    
    foreach($result2 as $row2){
//        var_dump($row);
        
        array_push($dataPoints, array("x"=> "$row2[month]", "y"=> "$row2[count]"));
    }
//    die;
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>
            
   <script>
window.onload = function () {
 
var chartMember = new CanvasJS.Chart("chartMember", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Member"
	},axisX:{
        interval: 1,
        title: "Tháng"
      },axisY:{
        title: "Số Lượng"
      },     
	data: [{
		
		dataPoints: <?php echo json_encode($dataMember, JSON_NUMERIC_CHECK); ?>
	}]
});
chartMember.render();

var chartProduct = new CanvasJS.Chart("chartProduct", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "New Product"
	},axisX:{
        interval: 1,
        title: "Tháng"
      },axisY:{
        title: "Số Lượng"
      },     
	data: [{
		
		dataPoints: <?php echo json_encode($dataProduct, JSON_NUMERIC_CHECK); ?>
	}]
});
chartProduct.render();

var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Bill"
	},axisX:{
        interval: 1,
        title: "Tháng"
      },axisY:{
        title: "Số Lượng"
      },     
	data: [{
		 
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>   
</body>
</html>
