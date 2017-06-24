<?php 
	require_once 'MySqliPHPTools.class.php';

	class Friend
	{
		function getFriendList($username)
		{
			$sql = "select * from user where username != '$username'";
				file_put_contents("../QQ/message.txt", $sql."\r\n", FILE_APPEND);

			$MySqliPHPTools = new MySqliPHPTools();

			$array = $MySqliPHPTools->execute_dql2($sql);

			$messageInfo = "<messes>";
			for($i = 0; $i < count($array); $i++)
			{
				$row = $array[$i];
				$messageInfo .= "<mesid>{$row['id']}</mesid><sender>{$row['username']}</sender>";

			}


			$arr = array();
			for($i = 0; $i < count($array); $i++)
			{
				$row = $array[$i];
				$arr[] = $row['username'];

			}
			// file_put_contents("../QQ/message.txt", $messageInfo."\r\n", FILE_APPEND);

			$MySqliPHPTools->closeConnect();
			return $arr;



		}
	}

	

























 ?>