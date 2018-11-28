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

	$sql="INSERT INTO 心得 (學生帳號, 民宿編號, 發文時間, 按讚數, 心得文字, 心得圖片)
	VALUES
	('$_POST[row1]','$_POST[row2]','$_POST[row3]','$_POST[row4]','$_POST[row5]','$_POST[row6]')";


	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));
	mysqli_close($con);
?>
