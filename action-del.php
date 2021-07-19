<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
	// $servername = "localhost";
	// $username = "root";
	// $password = "root";
	// $dbname = "jsj";
	 
	// // 创建连接
	// $conn = mysqli_connect($servername, $username, $password, $dbname);
	// // Check connection
	// if (!$conn) {
	//     die("连接失败: " . mysqli_connect_error());
	// }
	
	$conn = mysqli_connect('localhost', 'root', 'root','jsj');
	$stuno = $_GET['stuno'];
	$sql = "DELETE FROM student WHERE stuno={$stuno}";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
	    exit('查询数据sql语句执行失败。错误信息：'.mysqli_error($conn));  // 获取错误信息
	}
	header('Location:sss.php');
	exit;
	
	
	            ?>
	</body>
</html>
