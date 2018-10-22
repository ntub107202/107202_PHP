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
	$sql = "select 學生姓名,就讀學校,工作經驗,換宿原因,學生的臉,性別, 生日, 學生手機,
	CONCAT(居住地市名, 居住地區名, 居住地路名), 電子信箱, 生活照, 就學狀態,興趣, 飲食習慣,
	換宿起始日, 換宿結束日, 收藏清單, 就讀科系, 庭園整理 from 學生帳號";

	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));;
	$result = array();


	//只需要改array_push內的row1,row2
	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
		'name'=>$row[0],
		'school'=>$row[1],
		'jobExp'=>$row[2],
		'exchangeReason'=>$row[3],
		'face'=>$row[4],
		'gender'=>$row[5],
		'birth'=>$row[6],
		'cellphone'=>$row[7],
		'address'=>$row[8],
		'email'=>$row[9],
		'lifePhoto'=>$row[10],
		'studyState'=>$row[11],
		'interest'=>$row[12],
		'eatingHabit'=>$row[13],
		'startingDate'=>$row[14],
		'endingDate'=>$row[15],
		'collectionList'=>$row[16],
		'department'=>$row[17],
		'gardening'=>$row[18]
		));
	}

	echo json_encode(array("result"=>$result),JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
