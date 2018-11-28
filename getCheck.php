<?php

	//建立連線
	$con=mysqli_connect("localhost","root","860319","open_data")or die("Error " . mysqli_error($con));
	//設定字碼集
	mysqli_query($con,"set names utf8");

	if (mysqli_connect_errno($con))
	{
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//sql寫mysql指令
	$sql = "select Id from allhostel where name = '$_POST[user]'";

	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));;
	$result = array();


	//只需要改array_push內的row1,row2
	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
		'row1'=>$row[0]
		));
	}

	echo json_encode(array("result"=>$result),JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
