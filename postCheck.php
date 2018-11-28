<?php

	//建立連線
	$con=mysqli_connect("localhost","root","860319","open_data")or die("Error " . mysqli_error($con));
	//設定字碼集
	mysqli_query($con,"set names utf8");

	if (mysqli_connect_errno($con))
	{
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//$_POST[row1] android傳進來的值 row1是傳進來的參數名稱

	$sql="INSERT INTO 審核清單 (民宿名稱, 是否合格)
	VALUES
	('$_POST[row1]','$_POST[row2]')";


	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));
	mysqli_close($con);
?>
