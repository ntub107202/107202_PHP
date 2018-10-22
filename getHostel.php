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
	$sql = "select 民宿資訊.民宿名稱,CONCAT( 民宿資訊.民宿地址市, 民宿資訊.民宿地址區, 民宿資訊.民宿地址路)
	 , 民宿資訊.民宿圖片, 職缺.職缺名稱 , 職缺.薪水, 職缺.開始日期, 職缺.結束日期, 職缺.開始時間
	 , 職缺.結束時間, 職缺.需求人數, 職缺.工作內容, 民宿主帳號.民宿主姓名, 民宿主帳號.民宿主帳號,
	 民宿主帳號.民宿主電話, datediff(職缺.結束日期,職缺.開始日期), 民宿資訊.評價
	  from (( 民宿資訊 INNER JOIN 職缺 ON 民宿資訊.民宿編號 = 職缺.民宿編號) INNER JOIN 民宿主帳號 ON
		民宿資訊.民宿主帳號 = 民宿主帳號.民宿主帳號)";

	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));;
	$result = array();


	//只需要改array_push內的row1,row2
	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
		'hostelName'=>$row[0],
		'hostelAddress'=>$row[1],
		'hostelPhoto'=>$row[2],
		'vacancyName'=>$row[3],
		'vacancySalary'=>$row[4],
		'vacancyStartDate'=>$row[5],
		'vacancyEndDate'=>$row[6],
		'vacancyStartTime'=>$row[7],
		'vacancEndTime'=>$row[8],
		'vacancyNumPeople'=>$row[9],
		'vacancyJob'=>$row[10],
		'hostelOwnerName'=>$row[11],
		'hostelOwnerAccount'=>$row[12],
		'hostelOwnerPhone'=>$row[13],
		'vacancyDays'=>$row[14],
		'hostelRate'=>$row[15]
		));
	}

	echo json_encode(array("result"=>$result),JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
