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

	$sql="INSERT INTO 職缺 (職缺名稱, 薪水, 包吃, 包住, 釣魚, 浮潛, 提供機車, 開始日期, 開始時間, 結束日期, 結束時間, 需求人數, 工作內容)
	VALUES
	('$_POST[row1]','$_POST[row2]','$_POST[row3]','$_POST[row4]','$_POST[row5]','$_POST[row6]','$_POST[row7]','$_POST[row8]','$_POST[row9]','$_POST[row10]','$_POST[row11]','$_POST[row12]','$_POST[row13]')";


	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));
	mysqli_close($con);
?>
