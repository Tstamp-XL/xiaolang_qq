<?php 
	header("Content-Type: text/xml; charset=utf-8");
	header("Cache-Control: no-cache");
	require_once 'MessageService.class.php';

	// 这个控制器专门用于响应用户去数据的请求

	$getter = $_POST['getter'];
	$sender = $_POST['sender'];

	// file_put_contents("message.txt", $sender."-".$getter."\r\n", FILE_APPEND);

	// 创建一个MessageService.class.php对象
	$messageService = new MessageService();
	$mess = $messageService->getMessage($getter, $sender);


	echo $mess;
	// file_put_contents("message.txt", $mess."\r\n", FILE_APPEND);





































 ?>