<?php 
if(isset ($_POST ['id'])) {
$id = $_POST['id'];
require_once ('dbhelper.php');

$sql = 'delete from student where id ='.$id;
execute ($sql);
echo 'xoa sinh vien thanh cong';
	}