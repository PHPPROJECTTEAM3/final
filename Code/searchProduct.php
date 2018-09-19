<?php
include_once '../PRJ_Library/connect_DB.php';
?>

<?php

$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
$sql = $link->prepare("SELECT * FROM product WHERE name LIKE? ");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["name"];
		}
		echo json_encode($countryResult);
	}
        
?>
