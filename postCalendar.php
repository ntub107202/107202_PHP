<?php

	//建立連線
	$con=mysqli_connect("localhost","root","860319","we")or die("Error " . mysqli_error($con));
	//設定字碼集
	mysqli_query($con,"set names utf8");

	if (mysqli_connect_errno($con))
	{
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//$_POST[row1] android傳進來的值 row1是傳進來的參數名稱

	$sql="INSERT INTO 工作清單 (工作名稱, 日常性工作, 開始時間, 結束時間, 工作內容, 工作日期)
	VALUES
	('$_POST[row1]','$_POST[row2]','$_POST[row3]','$_POST[row4]','$_POST[row5]','$_POST[row6]')";


	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));
	mysqli_close($con);
?>
