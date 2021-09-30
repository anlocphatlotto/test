<?php 

require_once ('config.php');

// ham insert, update , delete => su dung function
function execute ($sql) {

	//tao ket noi toi database
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD, DATABASE);

	//query 
	mysqli_query($conn, $sql);

	// dong ket noi
	mysqli_close($conn);
	}

// su dung cho cac cau lenh Select - tra ve cac ket qua
function executeResult($sql) {

	//tao ket noi toi database
	$conn = mysqli_connect(HOST,USERNAME,PASSWORD, DATABASE);

	//query
	$resultset = mysqli_query($conn, $sql);
	$list =[];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row ;
	}
	// dong ket noi
	mysqli_close($conn);

	return $list ;
}