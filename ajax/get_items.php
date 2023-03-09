<?php
	include '../connection.php';

	$supplier_name = $_GET['supplier_name'];
	
	$sql = "SELECT * FROM supplier WHERE supplier_name = '$supplier_name'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	// var_dump($count);

	if($count != 0)
	{
		$data = array();
	
		while($row=mysqli_fetch_row($result)){
			$data[] = array("supplier_name" => $row[0], "supplier_contact" => $row[2]);
		}
		print json_encode($data);		
		
		// return $data[2];
		
	}
		
	
	
?>
