<?php 

	class MySqliPHPTools
	{
		private $mysqli;
		private static $host = "localhost";
		private static $user = "root";
		private static $password = "root";
		private static $db = "chat";

		public function __construct()
		{
			// 完成初始化任务
			$this->mysqli = new mysqli(self::$host, self::$user, self::$password, self::$db);
			if ($this->mysqli->connect_error) 
			{
				die("连接失败......".$this->mysqli->connect_error);
			}

			// 设置访问数据库字符集
			$this->mysqli->query("set names utf-8");
		}

		public function execute_dql($sql)
		{
			$query = $this->mysqli->query($sql) or die("操作dql".$this->mysqli->error);

			return $query;
		}

		public function execute_dql2($sql)
		{
			$arr = array();
			$query = $this->mysqli->query($sql) or die("操作dql".$this->mysqli->error);

			// 把query->$arr  把结果集内容转移到一个数组中
			while ($row = mysqli_fetch_assoc($query)) 
			{
				$arr[] = $row;
			}

			mysqli_free_result($query);
			return $arr;
		}

		public function execute_dml($sql)
		{
			$query = $this->mysqli->query($sql) or die("操作dql".$this->mysqli->error);

			if(!$query)
			{
				return 0; // 表示失败
			}
			else
			{
				if ($this->mysqli->affected_rows > 0) 
				{
					return 1; // 表示成功
				}
				else
				{
					return 2; // 表示木有受到任何影响
				}
			}
		}

		// 关闭连接的方法
		public function closeConnect()
		{
			if(!empty($this->conn))
			{
				mysqli_close($this->mysqli);
			}
		}
	}




















 ?>