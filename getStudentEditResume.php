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
	$sql = "select `學生姓名`, `性別`, `生日`, `學生手機`, `居住地市名`,
	 `居住地區名`, `居住地路名`, `電子信箱`, `學生LineID`, `學生的臉`, `生活照`, `就學狀態`, `就讀學校`,
	  `就讀科系`, `興趣`, `工作經驗`, `換宿原因`, `飲食習慣`, `換宿起始日`, `換宿結束日`, `收藏清單`, `庭園整理`,
		`房務清潔`, `餐廳服務`, `櫃台接待`, `資料整理`, `料理`, `攝影`, `園藝`, `美術設計`, `網站管理`, `舞蹈`, `唱歌`,
		`樂器演奏`, `英文`, `日文`, `閩南語`, `機車駕照`, `汽車駕照`, `桌子`, `椅子`, `衣櫃`, `床`, `冰箱`, `冷氣`,
		`電視`, `熱水器`, `洗衣機`, `Wi-Fi`, `第四台`, `天然瓦斯` from 學生帳號  where 學生帳號 = '$_POST[user]'";
//'$_POST[user]'
	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));;
	$result = array();
	$k = array();
	$v = array();

	// for($j=0 ; $j<$i ; $j++){
	// 　echo '第 '.$j.' 圈 : '.$Arr[$j].'<br>';
	// }
	// for($i=0; $i <=51; $i++){
	//     array_push($result, ‘row’.$i+1=>$row[$i]);
	// }
	while($row = mysqli_fetch_array($res)){
			for($i=0; $i <51; $i++){
				$x =$i +1;
				array_push($k, 'row'.$x);
				array_push($v, $row[$i]);
			}
	}

	$result = array(array_combine($k, $v));
	//只需要改array_push內的row1,row2
	// while($row = mysqli_fetch_array($res)){
	// 	array_push($result,array(
	// 	'row1'=>$row[0],
	// 	'row2'=>$row[1],
	// 	));
	// }


	echo json_encode(array("result"=>$result),JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
