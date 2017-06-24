<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>聊天室</title>
</head>
	<?php 
		// 接受window.open传递过来的用户名
		$username = $_GET['username'];

		// 取出session保存的登录用户名
		session_start();
		$loginUsername = $_SESSION['loginUsername'];

	 ?>
	<script type="text/javascript" src="login.js"></script>
	<script type="text/javascript">
		// resizeTo(500, 700);

		// 响应send事件
		function sendMessage()
		{
			// 创建一个xmlhttprequest对象
			var myXmlHttpRequest = getXmlHttpObject();
			if (myXmlHttpRequest) 
			{
				var url = "sendMessageController.php";
				// JavaScript 使用php的数据
				// 如何得到发送人的名字
				var data = "con=" + $('con').value + "&getter=<?php echo $username; ?>&sender=<?php echo $loginUsername; ?>";
				

				// 打开请求
				myXmlHttpRequest.open("post", url, true);
				myXmlHttpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				myXmlHttpRequest.onreadystatechange = function()
				{
					if (myXmlHttpRequest.readyState == 4 && myXmlHttpRequest.status == 200) 
		        	{

		        	}
				}

				myXmlHttpRequest.send(data);
				$('textarea').value += "你对 <?php echo $username; ?>说：" + $('con').value + " " + new Date().toLocaleString() + "\r\n";
			}
			$('con').value = "";
		}

		window.setInterval("getMessage()", 3000);

		function getMessage()
		{
			// 创建一个xmlhttprequest对象
			var myXmlHttpRequest = getXmlHttpObject();
			if (myXmlHttpRequest) 
			{
				var url = "getMessageController.php";
				var data = "getter=<?php echo $loginUsername; ?>&sender=<?php echo $username; ?>"
				console.log(url+data);
				myXmlHttpRequest.open("post", url, true);
				myXmlHttpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

				myXmlHttpRequest.onreadystatechange = function()
				{
					if (myXmlHttpRequest.readyState == 4 && myXmlHttpRequest.status == 200) 
		        	{
		        		var mess = myXmlHttpRequest.responseXML;
		        		console.log(mess);

		        		var cons = mess.getElementsByTagName('con');
		        		var sendTime = mess.getElementsByTagName('sendTime');
		        		
		        		
		        		if(mess.length != 0)
		        		{
		        			for(var i = 0; i < cons.length; i++)
		        			{
		        				var str = "<?php echo $username; ?>对你说：" + cons[i].childNodes[0].nodeValue + " " + sendTime[i].childNodes[0].nodeValue;
		        				$('textarea').value += str + "\r\n";
		        			}
		        			

		        		}
		        		

		        		// console.log(mesObj['sender']);
		        		// console.log(mesObj['getter']);
		        		// console.log(mesObj['content']);
		        		// $("textarea").value = mesObj['getter'] + "：" + mesObj['content'];
		        		// file_put_contents("message.txt", mess+"\r\n", FILE_APPEND);

		        	}
				}

				// 指定处理结果的函数
				/*myXmlHttpRequest.onreadystatechange = function()
				{
					if (myXmlHttpRequest.readyState == 4 && myXmlHttpRequest.status == 200) 
		        	{
		        		var mess = myXmlHttpRequest.responseText;
		        		// console.log(mess);
		        		
		        		
		        		if(mess.length != 0)
		        		{
		        			var mesObj = eval("(" + mess + ");");
		        			console.log(mesObj);


		        		}
		        		

		        		// console.log(mesObj['sender']);
		        		// console.log(mesObj['getter']);
		        		// console.log(mesObj['content']);
		        		// $("textarea").value = mesObj['getter'] + "：" + mesObj['content'];
		        		// file_put_contents("message.txt", mess+"\r\n", FILE_APPEND);

		        	}
				}*/
				myXmlHttpRequest.send(data);
			}
		}
	</script>
	<?php 
		// 接受window.open传递过来的用户名
		$username = $_GET['username'];

	 ?>

	 <style type="text/css">
		#con{
			width: 460px;
		}
	 </style>
<body>
	<h3><?php echo $loginUsername; ?>你正在和<?php echo $username; ?>聊天</h3>
	<textarea id="textarea" cols="70" rows="20"></textarea><br>
	<input type="text" name="" id="con">
	<input id="button" type="button" name="" value="发送" onclick="sendMessage()">
</body>
</html>
<?php 





























 ?>