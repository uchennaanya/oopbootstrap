<?php

class server {
	
	private $server = "localhost";
	private $dbase = "test";
	private $user = "root";
	private $pass = "";
	public $conn;
	
	public function __construct() {
		
		try {
			
			$this->conn = new PDO("mysql:host=$this->server;dbname=$this->dbase", $this->user, $this->pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			} catch (PDOException $err) {
			
				echo $err->getMessage();
		}
	}
}

?>