<?php

require_once ('dbhelper.php');

	$s_fullname = $s_age = $s_address =  '';

if (!empty($_POST)) {
	$s_id = '';
	if (isset($_POST['fullname'])) {
		$s_fullname = $_POST['fullname'];
	}
	if (isset($_POST['age'])) {
		$s_age = $_POST['age'];
	}
	if (isset($_POST['address'])) {
		$s_address = $_POST['address'];
	}
	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}	
	$s_fullname	= str_replace ('\' ', '\\\'', $s_fullname);
	$s_age     	= str_replace('\' ', '\\\'', $s_age) ;
	$s_address 	= str_replace ('\' ', '\\\'', $s_address);	
	$s_id 		= str_replace ('\' ', '\\\'', $s_id);

	if($s_id != ''){
		//update
	$sql = "UPDATE student set fullname = '$s_fullname' , age = '$s_age', 
	address = '$s_address' where id = ".$s_id;
	} else {
		// insert
	$sql = "INSERT into student (fullname, age, address) value ('$s_fullname','$s_age','$s_address')";
	}

	execute ($sql);
	// echo $sql;
	header ('Location: index.php');
	die();

// cấu trúc insert này dễ bị hack dữ liệu khi người dùng insert cấu trúc như sau :  INSERT INTO STUDENT (FULLNAME, AGE, ADDRESS) VALUE ('name => A', '1', 'HN');delete from student;/*)     // dấu comment  => lập tức toàn bộ dữ liệu database bị xoá

// ĐÂY LÀ LỖI SQL INJECTION

// REMOVE SPECIAL CHARACTERS FROM STRING SQL
}

$id='';
if (isset($_GET['id'])) {
	$id = $_GET ['id'] ;
	$sql= 'select * from student where id = '.$id;
	$studentList = executeResult ($sql);
	
	if($studentList !=null && count ($studentList) >0) {
		$std 		= $studentList[0];
		$s_fullname = $std['fullname'];
		$s_age 		= $std['age'];
		$s_address 	= $std['address'];
	} else {
		$id='';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <!-- JQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <!-- Pooer JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="text-center">Add Student</h2>
		</div>
		<div class="panel-body">
			<!-- method nhan 2 gia tri get va post -->
			<!-- method: GET  => $_GET du lieu dc day len URL --> 
			<!-- method: POST => $_POST du lieu duoc an di --> 
			<!-- method : GET/POST => $_REQUEST : lay duoc ca get va post -->

			<!-- action : du lie goi di dau - goi toi file nao ?, de rong : goi toi chinh no  -->

		<form method="post" action="">
			<div class="form-group">
				<label for="usr">Name:</label>
				<input type="number" name="id" value="<?=$id?>" style="display: none ;">
				<input  required="true" type="text" class="form-control" id="usr" name="fullname" value="<?=$s_fullname?>">
			</div>
			<div class="form-group">
				<label for="birthday">Age:</label>
				<input required="true" type="number" class="form-control" id="age" name="age" value="<?=$s_age?>" >
			</div>
			<div class="form-group">
				<label for="address">Address: </label>
				<input required="true" type="text" class="form-control" id="address" name ="address" value="<?=$s_address?>">
			</div>
			<button class="btn btb-success">Save</button>
			<!-- <button type="button" class="btn btn-success">Save</button> -->
		</form>
		</div>
	</div>
</div>
</body>
</html>