
		<?php
		//header('content-type:application/json;charset=utf-8');
		$db=new mysqli('localhost', 'root', 'root', 'jsj');
		if ($db->connect_errno) {
		    exit('连接失败'.mysqli_error($db));
		}
		// $sql='select * from wish';
		// $resulted=mysqli_query($db,$sql);
		// $row=mysqli_fetch_assoc($result);
		// print_r($row);
		// while($a=mysqli_fetch_assoc($result)){
		// 	$list[]=$a;
		// };
		//print_r($list);
		//  foreach($list as $key=>$val){
		// 	 echo "id: " . $val["id"]. " 姓名: " . $val["name"]. "愿望 " . $val["content"]. '时间:' . $val['time'] . '颜色:' . $val['color']. "<br>";
		// }
		class Response
		{
		    public static function json($code, $message='', $data=array())
		    {
		        $resulted=array(
		        'code'=>$code,
		        'message'=>$message,
		        'data'=>$data
		        );
		        echo json_encode($resulted, JSON_UNESCAPED_UNICODE);
		    }
		}
		?>
