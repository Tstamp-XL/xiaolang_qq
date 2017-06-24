<?php 

	require_once 'MySqliPHPTools.class.php';
	// 接受当前登录的用户名和密码
	$loginUsername = $_POST['username'];
	$loginPassword = $_POST['password'];

	// 判断用户名和密码 mysql中的用户表


	// preg_match("/^\d*$/",$fgid);
	// if(!reg.test(textBox.Value)) testBox.Value="只能输入数字";*/
	// 输入的密码必须位数字
	if(preg_match("/^\d*$/",$loginPassword)) 
	{
		// 跳转到好友列表界面

		$sql = "select * from user where username = '$loginUsername' and password = md5('$loginPassword')";
		file_put_contents("../QQ/message.txt", $sql."---------------------------\r\n", FILE_APPEND);

		$MySqliPHPTools = new MySqliPHPTools();

		$array = $MySqliPHPTools->execute_dql2($sql);

		file_put_contents("../QQ/message.txt", count($array)."\r\n", FILE_APPEND);
		// file_put_contents("../QQ/message.txt", $array."\r\n", FILE_APPEND);
		if (count($array) != 0) 
		{
			// 把登录的用户名字保存到session
			session_start();
			$_SESSION['loginUsername'] = $loginUsername;
			header("location: friendList.php");
		}
		else
		{
			// 重新登录
			header("location: login.php");
		}

		/*while ($row = mysqli_fetch_row($array)) 
		{
			foreach ($row as $key => $value) 
			{
				file_put_contents("../QQ/message.txt", $value."\r\n", FILE_APPEND);
			}
		}*/
		







		
	}
	else
	{
		// 重新登录
		header("location: login.php");
	}

















 ?>