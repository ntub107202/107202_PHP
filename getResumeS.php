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
	//	CONCAT(民宿資訊.民宿地址市, 民宿資訊.民宿地址區, 民宿資訊.民宿地址路)
	//	from (( 心得 INNER JOIN 學生帳號 ON 心得.學生編號 = 學生帳號.學生編號)
	//	INNER JOIN 民宿資訊 ON 心得.民宿編號 = 民宿資訊.民宿編號)";
	// $sql = "select 民宿資訊.民宿名稱, CONCAT(民宿資訊.民宿地址市, 民宿資訊.民宿地址區, 民宿資訊.民宿地址路),
	//  職缺.職缺名稱, 職缺.工作內容, 民宿資訊.民宿圖片 from
	// ((要求雇用_民宿主投_學生接 INNER JOIN 民宿資訊 ON 要求雇用_民宿主投_學生接.民宿編號 = 民宿資訊.民宿編號)
	// INNER JOIN 職缺 ON 民宿資訊.民宿編號 = 職缺.民宿編號) where 學生帳號 = '10636017'";


	// $res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));;
	// $result = array();
	//
	//
	// //只需要改array_push內的row1,row2
	// while($row = mysqli_fetch_array($res)){
	// 	array_push($result,array(
	// 	'row1'=>$row[0],//民宿名稱
	// 	'row2'=>$row[1],//addr
	// 	'row3'=>$row[2],//職缺名稱
	// 	'row4'=>$row[3],//工作內容
	// 	'row5'=>$row[4]//圖片
	// 	));
	// }

	$sql = "select 民宿編號 from 要求雇用_民宿主投_學生接 where 學生帳號 = '$_POST[user]'";
  //$sql = "select 職缺名稱,工作內容,開始日期,結束日期 from 職缺 where 民宿主帳號 = 's920613a@gmail.com'";
	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));;
	$result = array();
	$result2 = array();

	//只需要改array_push內的row1,row2
	//$res = mysqli_query($con,$sql2)or die("Error in Selecting " . mysqli_error($con));
	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
		'no'=>$row[0],
		));
		$sql2 = "select 民宿資訊.民宿名稱, CONCAT(民宿資訊.民宿地址市, 民宿資訊.民宿地址區, 民宿資訊.民宿地址路),
		  			 職缺.職缺名稱, 職缺.工作內容, 民宿資訊.民宿圖片 from 民宿資訊 INNER JOIN 職缺 ON
						 民宿資訊.民宿編號 = 職缺.民宿編號 where 民宿資訊.民宿編號 = $row[0]";
		$res2 = mysqli_query($con,$sql2)or die("Error in Selecting " . mysqli_error($con));
		$row2 = mysqli_fetch_array($res2);
		array_push($result2,array(
			'row1'=>$row2[0],//民宿名稱
			'row2'=>$row2[1],//addr
			'row3'=>$row2[2],//職缺名稱
			'row4'=>$row2[3],//工作內容
			'row5'=>$row2[4]//圖片
		));
	}

	echo json_encode(array("result"=>$result2),JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
