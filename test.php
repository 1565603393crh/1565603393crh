
		
		<?php
		require_once'conn.php';
		//header('content-type:application/json;charset=utf-8');
		header('Access-Control-Allow-Origin:*');
		$db->query("SET NAMES utf8");
		$username=$_GET['username'];
		 $sql="select * from student where stuname like '%$username%'";
		 $resulted=$db->query($sql);
		 //print_r($resulted);
		 
		//var_dump($resulted->fetch_assoc());
		
		$dataarr=array();
		while ($row=mysqli_fetch_assoc($resulted)) {
		    $dataarr[]=$row;
		}
		
		Response::json(1, '数据返回成功', $dataarr);
		$resulted->close();
		$db->close()
		?>
