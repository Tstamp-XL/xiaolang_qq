<?php 

	class MySqlPHPTools
	{
		private $conn;
		private $host = "127.0.0.1";
		private $user = "root";
		private $password = "root";
		private $db = "chat";

		function MySqlPHPTools()
		{
			$this->conn = mysql_connect($this->host, $this->user, $this->password);
			if(!$this->conn)
			{
				die("连接数据库失败".mysql_error());
			}
			mysql_select_db($this->db);
			mysql_query("set name utf8");
		}

		// select
		function exeute_dql($sql)
		{
			// $query = mysql_query($sql, $this->conn);

			$query = mysql_query($sql, $this->conn) or die(mysql_error());

			return $query;

			
		}

		function printDql($query)
		{
			// $flag = true;

			while ($fieldInfo = mysql_fetch_field($query)) 
			{
				echo $fieldInfo->name."&nbsp;&nbsp;&nbsp;&nbsp;";
			}
			echo "<br>";
			while ($row = mysql_fetch_row($query)) 
			{
				/*if($flag)
				{
					foreach ($row as $key => $value) {
						echo mysql_field_name($query, $key)."&nbsp;&nbsp;&nbsp;&nbsp;";
					}
					echo "<br>";
				}$flag = false;*/
				foreach ($row as $key => $value) {
					echo $value."&nbsp;&nbsp;&nbsp;&nbsp;";
				}
				echo "<br>";
			}
			mysql_free_result($query);
		}

		// update insert delete
		function exeute_dml($sql)
		{
			$query = mysql_query($sql, $this->conn);
			if (!$query) 
			{
				return 0; // 失败
			}
			else
			{
				if (mysql_affected_rows($this->conn) > 0) 
				{
					return mysql_insert_id($this->conn);
					return 1; // 表示成功
				}
				else
				{
					return 2; // 表示没有任何影响
				}
			}
			mysql_close();
		}
	}


























 ?>