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

	$sql="INSERT INTO 民宿資訊 (民宿名稱, 民宿地址市, 民宿地址區, 民宿地址路, 民宿電話, 民宿資訊, 民宿執照, 民宿圖片, 民宿主帳號)
	VALUES
	('$_POST[row1]','$_POST[row2]','$_POST[row3]','$_POST[row4]','$_POST[row5]','$_POST[row6]','$_POST[row7]','$_POST[row8]','$_POST[row9]')";


	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));
	mysqli_close($con);
?>
