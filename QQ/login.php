<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<style type="text/css">
		
		#header{
			width: 430px;
			background: pink;
		}

		#header .headerCenter{
			background: yellow;
		}
		#header .headerCenter .left{
			float: left;
		}
		#header .headerCenter div{
			float: left;
		}
		#header .headerCenter .right{
			float: right;
		}
		#header .headerCenter .form{
			width: 194px;
			background: #EBF2F9;
			height: 148px;
			border-bottom: 1px solid #C9C9C9;
		}
		#header .headerCenter .form form{
			margin: 10px 0;
			line-height: 30px;
		}
		#header .headerCenter .form form .login{
			background: #09A3DC;
			border-radius: 7px;
			width: 194px;
			height: 30px;
			margin: 20px 0 0 0 ;
			color: #fff;
		}
		#header .headerCenter .form form .login:hover{
			background: #29B7EC;
		}
		#header .headerCenter .form form .text, #header .headerCenter .form form .password{
			width: 190px;
			height: 30px;
		}



	</style>
</head>
<body>
	<center>
		<script type="text/javascript">document.write(new Date().toLocaleString());</script><h1>Welcome</h1>
		<div id="header">
			<img src="image/loginHeader.jpg">
			<div class="headerCenter">
				<img class="left" src="image/loginLeft.jpg">
				<div class="form">
					<form action="loginProcess.php" method="post">
						<input class="text" type="text" name="username" placeholder="请输入用户名"><br>
						<input class="password" type="password" name="password" placeholder="请输入密码"><br>
						<input class="login" type="submit" name="" value="安全登录">
					</form>
				</div>
				<img class="right" src="image/lginRight.jpg">
			</div>
		</div>
	</center>
</body>
</html>
<?php 




























 ?>