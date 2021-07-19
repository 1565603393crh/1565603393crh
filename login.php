<?php 
$conn = mysqli_connect('localhost', 'root', 'root','user');
 if (!$conn) {
            exit('连接失败:'.mysql_connect_error());
        }

	$username=$_POST['myusername'];
	$password=$_POST['mypassword'];
	$success=array();
	$sql=mysqli_query($conn,"select * from user where username='$username'and password='$password' limit 1");
	$res=mysqli_fetch_array($sql);
	if($res){
		$success['info']=1;
		$success['msg']='登录成功,正在跳转...';
		//header('location:sss.php');
	}else{
		//echo '登录失败<a href="javascript:history.back(-1)">重新登录</a>';
		$success['info']=0;
		$success['msg']='登录失败，用户名或密码错误';
	}
    echo json_encode($success);

?>