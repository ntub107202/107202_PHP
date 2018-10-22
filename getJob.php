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
	$sql = "select 職缺名稱,工作內容,開始日期,結束日期,民宿編號 from 職缺 where 民宿主帳號 = '$_POST[user]'";
  //$sql = "select 職缺名稱,工作內容,開始日期,結束日期 from 職缺 where 民宿主帳號 = 's920613a@gmail.com'";
	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));;
	$result = array();
	$result2 = array();

	//只需要改array_push內的row1,row2
	//$res = mysqli_query($con,$sql2)or die("Error in Selecting " . mysqli_error($con));
	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
		'row1'=>$row[0],
		'row2'=>$row[1],
		'row3'=>$row[2],
		'row4'=>$row[3],
		'row5'=>$row[4]
		));
		$sql2 = "select 民宿名稱 from 民宿資訊 where 民宿編號 ='$row[4]'";
		$res2 = mysqli_query($con,$sql2)or die("Error in Selecting " . mysqli_error($con));
		$row2 = mysqli_fetch_array($res2);
		array_push($result2,array(
			'row6'=>$row2[0]
		));
	}
	/*
	while($row2 = mysqli_fetch_array($res)){
		array_push($result,array(
		'row5'=>$row2[0]
		));
	}
	*/
	echo json_encode(array("result"=>$result,"result2"=>$result2),JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
