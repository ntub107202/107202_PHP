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

	$uid = hash('sha256', $_POST['row4']);
	$sql="INSERT INTO 民宿主帳號 (uid, 民宿主帳號, 民宿主密碼, 民宿主姓名, 民宿主電話)
	VALUES
	('$uid','$_POST[row1]','$_POST[row2]','$_POST[row3]','$_POST[row4]')";


	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));
	mysqli_close($con);
?>
