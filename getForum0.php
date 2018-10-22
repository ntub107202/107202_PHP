<?php

	//建立連線
	$con=mysqli_connect("localhost","root","860319","we")or die("Error " . mysqli_error($con));
	//設定字碼集
	mysqli_query($con,"set names utf8");

	if (mysqli_connect_errno($con))
	{
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//sql寫mysql指令
	$sql = "select 學生帳號.學生姓名, 民宿資訊.民宿名稱, 心得.發文時間, 心得.按讚數, 心得.心得文字, 心得.心得圖片,
	CONCAT(民宿資訊.民宿地址市, 民宿資訊.民宿地址區, 民宿資訊.民宿地址路)
	from (( 心得 INNER JOIN 學生帳號 ON 心得.學生編號 = 學生帳號.學生編號)
	INNER JOIN 民宿資訊 ON 心得.民宿編號 = 民宿資訊.民宿編號)";

	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));;
	$result = array();


	//只需要改array_push內的row1,row2
	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
		'row1'=>$row[0],
		'row2'=>$row[1],
		'row3'=>$row[2],
		'row4'=>$row[3],
		'row5'=>$row[4],
		'row6'=>$row[5],
		'row7'=>$row[6]
		));
	}

	echo json_encode(array("result"=>$result),JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
