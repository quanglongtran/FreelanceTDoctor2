<?php
class dbConnect {
	var $host;
	var $user;
	var $pass;
	var $dbname;
	function dbConnect($host, $user, $pass, $dbname) {
		$this->host = $host;
		$this->user = $user;
		$this->pass  = $pass;
		$this->dbname = $dbname;
	}
	function open() {
		$conn = mysqli_connect($this->host,$this->user,$this->pass,$this->dbname);
		if(mysqli_connect_errno()) {
			echo 'Faild connect to mysql'.mysql_connect_errno();
		}
		return $conn;
	}
	function close() {
	 mysqli_close($this->open());
	}
	function exeQuery($query) {
		
		$conn = $this->open();
		mysqli_set_charset($conn, "utf8");
		$result = $conn->query($query);
				$data =  array();
		if(! $result) {
			 throw mysqli_connect_errno();
		}
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
		$this->close();
		return $data;
	}
	function exeNonQuery($query) {
	set_time_limit(12000);
	$conn = $this->open();
	 mysqli_set_charset($conn, "utf8");
	mysqli_query($conn,$query);
	printf("Affected rows (INSERT): %d\n", mysqli_affected_rows($conn));
	$this->close();
	
	}

}
