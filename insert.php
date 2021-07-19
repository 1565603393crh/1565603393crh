<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<style>
		.content{
			text-align: center;
		}
		
		
	</style>
	<body>
		<!-- <div class="content">
			
			<h1>添加学生</h1>
			<form action="" method="post" name="insert">
		<p>学号：<input type="number" name="id"></p>
		<p>姓名：<input type="text" name="name" /></p>
		<p>性别：<input type="text" name="sex" /></p>
		<p>电话：<input type="text" name="tel" /></p>
		<p>班级：<input type="text" name="class" /></p>
		<p>宿舍：<input type="text" name="sushe" /></p>
		<p>照片：<input name="class" name="photo"/></p>
			<input type="submit" value="提交" name="sub" />
			</form>
		
		
		</div> -->
		
		<?php
        $link=mysqli_connect('localhost', 'root', 'root', 'jsj');
        if (!$link) {
            exit('连接失败:'.mysql_connect_error());
        }
        if (!empty($_POST["sub"])) {
            $id=$_POST['id'];
            $name=$_POST['name'];
            $sex=$_POST['sex'];
            $tel=$_POST['tel'];
            $class=$_POST['class'];
            $dormno=$_POST['sushe'];
			$photo=$_POST['photo'];
            $sql="insert into student (stuno,stuname,sex,tel,classname,dormno,photopath) values ($id,'$name','$sex','$tel','$class','$dormno','$photo')";
            //$result=$link->query($sql);
            //var_dump($sql);
            //$sql='insert into wish values("5","王小明","考研成功","20201112","蓝色","1")';
            mysqli_query($link, $sql);
            header("location:sss.php");
            
        }
        
        
        
        ?>
	</body>
</html>
