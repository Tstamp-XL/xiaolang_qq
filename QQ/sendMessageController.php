<?php 
	
	require_once 'MessageService.class.php';

	// 控制器
	// 接受信息 发送人 收件人
	$sender = $_POST['sender'];
	$getter = $_POST['getter'];
	$con = $_POST['con'];

	file_put_contents("../QQ/message.txt", $sender."-".$getter."-".$con."\r\n", FILE_APPEND);

	// 创建一个MessageService.class.php对象
	$messageService = new MessageService();
	$mess = $messageService->addMessage($sender, $getter, $con);

	if($mess == 1)
	{
	}
	else 
	{
		echo "error";
	}
































 ?>