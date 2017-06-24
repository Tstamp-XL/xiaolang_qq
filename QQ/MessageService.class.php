<?php 
	


	require_once 'MySqliPHPTools.class.php';
	class MessageService
	{
		// 添加信息到数据库中
		function addMessage($sender, $getter, $con)
		{
			// 组织一个sql语句 now()不需要单引号 这里是一个坑
			$sql = "insert into messages(sender, getter, content, sendTime) values('$sender', '$getter', '$con', now());";

			// file_put_contents("../QQ/message.txt", $sql."\r\n", FILE_APPEND);

			// 创建一个MySqliPHPTools.class.php对象
			$MySqliPHPTools = new MySqliPHPTools();

			return $MySqliPHPTools->execute_dml($sql);

		}

		// 获取数据 并把数据组装好 返回给chatRoom.php
		function getMessage($getter, $sender)
		{
			$sql = "select * from messages where getter = '$getter' and sender = '$sender' and isGet = 0;";
			// file_put_contents("../QQ/message.txt", $sql."\r\n", FILE_APPEND);
			// 当取出值以后 需要把isGet设为1 或者 制空

			$MySqliPHPTools = new MySqliPHPTools();

			$array = $MySqliPHPTools->execute_dql2($sql);


			$messageInfo = "<messes>";
			for($i = 0; $i < count($array); $i++)
			{
				$row = $array[$i];
				$messageInfo .= "<mesid>{$row['id']}</mesid><sender>{$row['sender']}</sender><getter>{$row['getter']}</getter><con>{$row['content']}</con><sendTime>{$row['sendTime']}</sendTime>";

			}
			$messageInfo .= "</messes>";

			// file_put_contents("../QQ/message.txt", $messageInfo."\r\n", FILE_APPEND);





			/*$info = "{";
			for($i = 0; $i < count($array); $i++)
			{
				file_put_contents("../QQ/message.txt", $i."wo wo wo \r\n", FILE_APPEND);
				if(($i+1) == count($array))
				{
					$info .= "'id".$i."':'".$array[$i]['id']."','sender".$i."':'".$array[$i]['sender']."','getter".$i."':'".$array[$i]['getter']."','content".$i."':'".$array[$i]['content']."'";
				}
				else
				{
					$info .= "'id".$i."':'".$array[$i]['id']."','sender".$i."':'".$array[$i]['sender']."','getter".$i."':'".$array[$i]['getter']."','content".$i."':'".$array[$i]['content']."',";
				}

			}
			$info .= "}";*/
			// file_put_contents("../QQ/message.txt", $info."\r\n", FILE_APPEND);



			/*foreach ($array as $key => $value) {
				// file_put_contents("../QQ/message.txt", $value."\r\n", FILE_APPEND);
				foreach ($value as $key1 => $value1) {
					file_put_contents("../QQ/message.txt", $value1."\r\n", FILE_APPEND);
				}
			}*/



			// 更新 已经取到过的语句
			$sql = "update messages set isGet = 1 where getter = '$getter' and sender = '$sender'";
			$MySqliPHPTools->execute_dml($sql);




			// file_put_contents("../QQ/message.txt", count($array)."\r\n", FILE_APPEND);

			// 返回 格式  xml json

			/*while ($row = mysqli_fetch_row($array)) 
			{

				// foreach ($row as $key => $value) {
				// 	file_put_contents("../QQ/message.txt", $value."\r\n", FILE_APPEND);
				// }
				// 更新数据库isGet 为1

				// file_put_contents("../QQ/message.txt", $row."\r\n", FILE_APPEND);

				// file_put_contents("../QQ/message.txt", count($row)."\r\n", FILE_APPEND);

				$json =  "{'sender' : '".$row[1]."','getter' : '".$row[2]."','content' : '".$row[3]."'}";
				// return $json;

				file_put_contents("../QQ/message.txt", count($json)."\r\n", FILE_APPEND);
				
			}

			file_put_contents("../QQ/message.txt", $con."\r\n", FILE_APPEND);*/



			$MySqliPHPTools->closeConnect();
			return $messageInfo;
		}
	}





















 ?>












