<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link href="https://unpkg.com/pattern.css" rel="stylesheet">
		<style>
			#plus{
				position: absolute;
				right: 0px;
			}
			#edit{
				position: absolute;
				right:240px;
				top: 10px;
			}
			body{
				background-color: #e5e5f7;
				opacity: 0.9;
				background-image: radial-gradient(#f745b4 0.5px, #e5e5f7 0.5px);
				background-size: 10px 10px;
			}
			
		</style>
	</head>
	<body>
		
		<?php ob_start(); ?>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/bootstrap.js"></script>
		<nav class="navbar navbar-light bg-light">
		  <form class="container-fluid justify-content-start">
		    <input type="text"  name="pusername" id="pusername">
		<button type="submit" class="btn btn-outline-dark" id="check">查询</button>
		    	<input class="btn btn-outline-primary" id="plus" value="添加学生" data-bs-target="#insert" data-bs-toggle="modal">
				<a href="##"><input type="button" class="btn btn-outline-secondary" value="设置" id="edit"></a>
		  </form>
		</nav>
		<form action="insert.php" method="post" name="insert">
		<div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">添加学生</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		       
					<div class="input-group mb-3">
					  <span class="input-group-text" id="basic-addon1">学号</span>
					  <input type="text" class="form-control" name="id" placeholder="填写学号" >
					</div>
		        <div class="input-group mb-3">
		          <span class="input-group-text" id="basic-addon1">姓名</span>
		          <input type="text" class="form-control" name="name" placeholder="填写姓名" >
		        </div>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">性别</span>
				  <input type="radio" class="btn-check" id="male" name="sex" value="男" checked/>
				  <label class="btn btn-outline-info" for="male">男</label>
				  <input type="radio" class="btn-check" id="female" name="sex" value="女"/>
				  <label class="btn btn-outline-info" for="female">女</label>
				</div>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">电话</span>
				  <input type="text" class="form-control" name="tel" placeholder="输入电话" >
				</div>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">班级</span>
				  <input type="text" class="form-control" name="class" placeholder="填写班级" >
				</div>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">宿舍</span>
				  <input type="text" class="form-control" name="sushe" placeholder="填写宿舍" >
				</div>
				<div class="input-group mb-3">
				  <span class="input-group-text" id="basic-addon1">照片</span>
				  <input type="text" class="form-control" name="photo" placeholder="放入照片" >
				
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">关闭</button>
		        <input type="submit" class="btn btn-primary" name="sub" value="提交">
		      </div>
		    </div>
		  </div>
		</div>
		</form>
		
	
		<div>
			<table id="mytable" class="table table-dark">
				
			</table>
		</div>
		<table  class="table table-hover table-primary" width="1000px">
			<tr >
				<th>学号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>电话</th>
				<th>班级</th>
				<th>宿舍</th>
				<th>照片</th>
				<th>操作</th>
			</tr>
			<form action="" method="post">
				<?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "jsj";
         
        // 创建连接
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("连接失败: " . mysqli_connect_error());
        }
         $total="select count(*) from student";
         $count=mysqli_query($conn, $total);
         $rows=mysqli_fetch_row($count);
         $num=$rows[0];
         $pagesize=5;
         $page=ceil($num/$pagesize);
         $pageno=isset($_GET['pageno'])?$_GET['pageno']:1;
         $start=($pageno-1)*$pagesize;
         $sql1="select * from student limit $start,$pagesize";
         $rs=mysqli_query($conn, $sql1);
         while ($res=mysqli_fetch_assoc($rs)) {
             $stuno=$res['stuno'];
             $stuname=$res['stuname'];
             $sex=$res['sex'];
             $tel=$res['tel'];
             $classname=$res['classname'];
             $dormno=$res['dormno'];
             $photopath=$res['photopath'];
             echo "<tr><td>$stuno</td><td>$stuname</td><td>$sex</td><td>$tel</td>><td>$classname</td><td>$dormno</td><td>$photopath</td><td>  <a href='javascript:del({$res['stuno']})'><input class='btn btn-warning' type='button' value='删除'></a>  <input class='btn btn-success' name='edit$stuno' type='submit' value='修改'></td></tr>";
             if (!empty($_POST["edit$stuno"])) {
                 echo '<tr>';
                 echo
                   "
				   <th>$stuno</th>
				   <th><input type='text' name='name' value='$stuname'></th>
				   <th><input type='text' name='sex' value='$sex'></th>
				   <th><input type='text' name='tel' value='$tel'></th>
				   <th><input type='text' name='classes' value='$classname'></th>
				   <th><input type='text' name='home' value='$dormno'></th>
				   <th><input type='text' name='photo' value='$photopath'></th>
				   <th><input type='submit' class='btn btn-info' name='edits$stuno' value='确认'></th>
				   ";
                 echo '</tr>';
             }
             if (!empty($_POST["edits$stuno"])) {
                 //$custuno=$_POST['no'];
                 $cuname=$_POST['name'];
                 $cusex=$_POST['sex'];
                 $cutel=$_POST['tel'];
                 $cuclass=$_POST['classes'];
                 $cudormno=$_POST['home'];
                 $cuphoto=$_POST['photo'];
                 $sqll="update student set stuname='$cuname',sex='$cusex',tel='$cutel',classname='$cuclass',dormno='$cudormno',photopath='$cuphoto' where stuno=$stuno";
                 // print_r($sqll);
                 mysqli_query($conn, $sqll)or die('修改失败');
                 header("location:#");
                 ob_end_flush();
             }
         }
        // $sql = "SELECT * FROM student";
        // $result = mysqli_query($conn, $sql);
        // if (mysqli_num_rows($result) > 0) {
        //     // 输出数据
        //     while ($row = mysqli_fetch_assoc($result)) {
        //         // echo "学号: " . $row["stuno"]. " - 姓名: " . $row["stuname"]. " " . $row["sex"]. '电话:' . $row['tel'] . '专业:' . $row['major'] . '班级:' . $row['classname'] . '宿舍:' . $row['dormno'] . '照片:' . $row['photopath'] . "<br>";
        //         $stuno = $row['stuno'];
        //         $stuname = $row['stuname'];
        //         $sex = $row['sex'];
        //         $tel=$row['tel'];
        //         $classname=$row['classname'];
        //         $dormno=$row['dormno'];
        //         $photopath=$row['photopath'];
         
        //         echo "<tr><td>$stuno</td><td>$stuname</td><td>$sex</td><td>$tel</td>><td>$classname</td><td>$dormno</td><td>$photopath</td><td>  <a href='javascript:del({$row['stuno']})'>删除</a>  <a href='editnews.php?stuno={$row['stuno']}'>修改</a></td></tr>";
        //     }
        // } else {
        //     echo "0 结果";
        // }
            
        mysqli_close($conn);
        ?>
				
			</form>
		
		</table>
		<script>
			function del (stuno) {
						if (confirm("确定删除这条吗？")){
							window.location =  "action-del.php?stuno="+stuno;
						}
					}
					
					
					$(function() {
						$('#check').click(function() {
							var username = $('#pusername').val()
							if (username != '') {
								var userdata = {
									'username': username
								}
								$.get('test.php', userdata, function(res, status) {
									console.log(res)
									console.log(typeof(res))
									if (status == 'success') {
										var obj = JSON.parse(res)
										var objdata = obj.data
										objdata.forEach(el => {
											let trnew = `<tr>
									<td>${el.stuno}</td>
									<td>${el.stuname}</td>
									<td>${el.sex}</td>
									<td>${el.tel}</td>
									<td>${el.classname}</td>
									<td>${el.dormno}</td>
									 <td><input name='edit$stuno' type='submit' value='修改'></td>
									</tr>`
											$('#mytable').append(trnew)
										})
									}
								});
					
							}else{
								alert('请输入姓名')
							}
						})
					})
		</script>
		
		
		<form>
		
				<ul class="pagination" style="position:absolute;left: 35%;top:500px;">
					<a href="sss.php?pageno=1" class="page-link">首页</a>
					 
					<?php
         for ($i=1;$i<=$page;$i++) {
             echo'<li class="page-item"><a class="page-link" href="sss.php?pageno='.$i.'">'.$i.'</a></li>';
         }
         ?>	
		 <a href="sss.php?pageno=10" class="page-link">尾页</a>
		 </ul>
		</form>		
	</body>
</html>
