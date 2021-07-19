<?php
$conn = mysqli_connect('localhost', 'root', 'root', 'user');
    $username=$_POST['username'];
    $password=$_POST['password'];
    $rpwd=$_POST['rpwd'];
	$success=array();
 if (!$conn) {
     exit('连接失败:'.mysql_connect_error());
 }
   
if(!$username){
	$success['info']=0;
	$success['msg']='用户名不能为空';
	echo json_encode($success);
	exit;
}
if(!$password){
	$success['info']=1;
	$success['msg']='密码不能为空';
	echo json_encode($success);
	exit;
}
$result=mysqli_query($conn,"select username from user where username='$username' limit 1");
$row=mysqli_fetch_assoc($result);
if($row){
	$success['info']=2;
	$success['msg']='用户名已存在';
	echo json_encode($success);
	exit;
}
if(strlen($password)<6){
	$success['info']=3;
	$success['msg']='密码不能小于六位';
	echo json_encode($success);
	exit;
}
if($password!=$rpwd){
	$success['info']=4;
	$success['msg']='密码不一致';
	echo json_encode($success);
	exit;
}


 $sql="insert into user (username,password)values('$username','$password')";

 $res=mysqli_query($conn, $sql);
                if (!$res) {
                    //exit('用户注册成功<a href="login.html">点击登录</a>');
					$success['info']=5;
					$success['msg']='注册失败';
					echo json_encode($success);
                } else {
                    //echo'失败';
					$success['info']=6;
					$success['msg']='注册成功';
					echo json_encode($success);
                }








// $result=mysqli_query($conn,"select * from user where 1");
// if($result->num_rows>0){
// 	$info=[];
// 	for($i=0;$row=$result->fetch_assoc();$i++){
// 		$info[$i]=$row;
// 	}
// 	for($j=0;$j<count($info);$j++){
// 		if($info[$j]['username']==$username){
// 			$success['info']=2;
// 		}else if(strlen($password)<6){
// 			$success['info']=3;
// 		}else if($password!=$rpwd){
// 			$success['info']=4;
// 		}else{
// 			$success['info']=6;
// 		}
// 	}
// }
//echo json_encode($success);


 //     if (strlen($password)<6) {
    //         exit('密码长度不足六位<a href="javascript:history.back(-1)">点击重试</a>');
    //     }
    //     if ($password==$rpwd) {
    //         $result=mysqli_query($conn,"select username from user where username='$username' limit 1");
    //         if (mysqli_fetch_array($result)) {
    //             echo '用户名:'.$username.'已经存在。<a href="javascript:history.back(-1)">点击重试</a>';
				// exit;
    //         }
            
    //         if (!empty($_POST['sub'])) {
    //             $username=$_POST['username'];
    //             $password=$_POST['password'];
    //             $rpwd=$_POST['rpwd'];
    //             $sql="insert into user (username,password,rpwd)values('$username','$password','$rpwd')";
    //             $res=mysqli_query($conn, $sql);
    //             if ($res) {
    //                 exit('用户注册成功<a href="login.html">点击登录</a>');
    //             } else {
    //                 echo'失败';
    //             }
    //         }
    //     } else {
    //         echo "密码不一致";
    //     }









