<?php

	//建立連線
	$con=mysqli_connect("localhost","root","860319","we")or die("Error " . mysqli_error($con));
	//設定字碼集
	mysqli_query($con,"set names utf8");

	if (mysqli_connect_errno($con))
	{
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//sql寫mysql指令 ( 心得 INNER JOIN 學生帳號 ON 心得.學生編號 = 學生帳號.學生編號)
	$sql = "select 履歷編號, 學生帳號.學生帳號, 民宿編號, 學生姓名, 就讀學校, 工作經驗, 換宿原因, 學生的臉 from 投履歷_學生投_民宿主接 INNER JOIN 學生帳號 ON 投履歷_學生投_民宿主接.學生帳號
	= 學生帳號.學生帳號  where 民宿主帳號 = '$_POST[user]'";

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
		'row7'=>$row[6],
		'row8'=>$row[7]
		));
	}

	echo json_encode(array("result"=>$result),JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
