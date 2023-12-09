<?php
include 'conn.php';

//get category
$sql_cat = "SELECT * from category LIMIT 0,10";
$result_cat = mysqli_query($db,$sql_cat);
$cat_array = array();

while($row = mysqli_fetch_array($result_cat)){
	$cat_array[$row['categoryId']] = array(
		'id' => $row['categoryId'],
		'type' => $row['type']
		);
}
echo json_encode($cat_array);


?>