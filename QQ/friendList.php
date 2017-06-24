<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的好友</title>
	<style type="text/css">
		@-webkit-keyframes 'xiaolang'{
			0%{
				-webkit-transform: scale(1);
				/*background-color: #000;*/
				/*border-radius: 5px;*/
				color: red;
			}
			40%{
				-webkit-transform: scale(1.2);
				/*background-color: #000;*/
				/*border-radius: 5px;*/
				color: red;
			}
			100%{
				-webkit-transform: scale(1);
				/*background-color: #000;*/
				/*border-radius: 5px;*/
				color: red;
			}
		}

		td:hover{
			-webkit-animation-name: 'xiaolang';
			-webkit-animation-duration: 2s;
			-webkit-animation-iteration-count: 1;
			display: inline-block;
		}

		 tr{
			list-style-type: decimal;
			line-height: 40px;
			font-size: 24px;

		}
		td{
			cursor: pointer;

		}
		td:hover{

		
		} 
	</style>

	<script type="text/javascript" src="login.js"></script>
	<script type="text/javascript">
		// 响应点击新的聊天窗口
		function openChatRoom(obj)
		{
			// 打开新窗口
			open("chatRoom.php?username="+obj.innerText, "_blank");
		}
	</script>
	<?php 

		require_once 'getFriendList.class.php';
		session_start();
		$loginUsername = $_SESSION['loginUsername'];

		file_put_contents("../QQ/message.txt", $loginUsername."\r\n", FILE_APPEND);

		$getFriendList = new Friend();

		$list = $getFriendList->getFriendList($loginUsername);

		// file_put_contents("../QQ/message.txt", $list."\r\n", FILE_APPEND);

		foreach ($list as $key => $value) 
		{
			file_put_contents("../QQ/message.txt", $value."\r\n", FILE_APPEND);
		}
	 ?>
<link href="We.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div>
		<div id="sum" class="setting">
			<img title="head_portrait" alt="head_portrait" src="image/head_portrait.jpg">
			<img title="chat" alt="chat" src="image/chat.jpg">
			<img title="contact" alt="contact" src="image/contact.jpg">
			<img title="collect" alt="collect" src="image/collect.jpg">
			<img id="img_setting" title="setting" alt="setting" src="image/setting.jpg">
		</div>
		<div id="sum" class="listing">
			<table>
				<thead>
					<tr>
						<td>
							<form style="overflow: hidden;">
								<input placeholder="搜索" id="input_textadd" class="textadd" type="text" size="20" name="search">
								<img class="textadd" alt="add" src="image/add.jpg">
							</form>
						</td>
					</tr>
				</thead>

				<?php 
					foreach ($list as $key => $value) 
					{
						file_put_contents("../QQ/message.txt", $value."\r\n", FILE_APPEND);
						echo "<tr><td onclick='openChatRoom(this)'>".$value."</td></tr>";
					}
				 ?>

				
			</table>
		</div>
	</div>



	<!-- <h1>好友列表</h1> -->
	<!-- <ul> -->
		<!-- <li onclick="openChatRoom(this)">小红</li> -->
		<!-- // <?php 
			// foreach ($list as $key => $value) 
			// {
				// file_put_contents("../QQ/message.txt", $value."\r\n", FILE_APPEND);
				// echo "<li onclick='openChatRoom(this)'>".$value."</li>";
			// }
		 ?> -->

		<!-- <li onclick="openChatRoom(this)">小红</li>
		<li onclick="openChatRoom(this)">小鸣</li>
		<li onclick="openChatRoom(this)">小欣</li>
		<li onclick="openChatRoom(this)">小烨</li>
		<li onclick="openChatRoom(this)">小朗</li> -->
	<!-- </ul> -->
</body>
</html>

