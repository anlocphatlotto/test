<?php 
require_once ('dbhelper.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>STUDENT MANAGER</title>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">
				QUAN LY THONG TIN SINH VIEN
				<form method="get">
					<input type="text" name="s" class="form-control" style="margin-top : 15px; margin-bottom: 15px;" placeholder="tim kiem theo ten">
				</form>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>STT</th>
					<th>Ho va Ten</th>
					<th>Tuoi</th>
					<th>Dia chi</th>
					<th width="60px">Sua</th>
					<th width="60px">Xoa</th>
				</tr>
			</thead>
				<tbody>
<?php
if(isset($_GET['s']) && $_GET['s'] !=''){
	$sql 	= 'SELECT * from student where fullname like "%'.$_GET['s'].'%"';
} else {
	$sql = 'SELECT * from student';
}

$studentList = executeResult($sql);
$index = 1;
foreach ($studentList as $std) {
	echo '<tr>
				<td>'.($index ++).'</td>
				<td>'.$std['fullname'].'</td>
				<td>'.$std['age'].'</td>
				<td>'.$std['address'].'</td>
				<td><button class="btn btn-warning" onclick=\'window.open ("input.php?id='.$std['id'].'","_self")\'>Edit</button></td>
				<td><button class="btn btn-danger" onclick="deleteStudent('.$std['id'].')">Delete</button></td>
		</tr>';
}

?>		
	
				</tbody>
			</table> 
			<button class=" btn btn-success" onclick="window.open('input.php','_self')">Add Student</button>
		</div>
	</div>
</div>

<!-- ajax -->
	<script type = "text/javascript">
		function deleteStudent (id) {
			option = confirm (' are you sure ?')
			if (!option){
				return;
			}
			console.log (id)
			$.post ('delete_student.php', {
				'id': id
			}, function (data) {
				alert (data)
				location.reload ()
			})
		}
	</script>

</body>
</html>