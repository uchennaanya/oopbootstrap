<?php

require_once "server.php";

class selectTransaction extends server {
	public function selectAll () {
		try {
			$sql = "SELECT * FROM uc ";
		
		$query = $this->conn->prepare($sql);
		$query->execute();
		
		if ($query->rowCount() == 0) {
			
			return 0;
		
		} else {
			return $query->fetchAll(PDO::FETCH_BOTH);
		}
		} catch (PDOException $e) {
			return $e->getMessage();
		}
		
	}
	
	public function selectUser($id) {
		
		try {
			$sql = "SELECT * FROM uc WHERE id  = :id";
			
			$query = $this->conn->prepare($sql);
			
			$query->execute(array(':id'=>$id));
			
			if ($query->rowCount() == 0 ) {
				return 0;
			} else {
				return $query->fetchAll(PDO::FETCH_BOTH);
			}
		} catch (PDOException $e) {
			return $e->getMessage();
		}
		
	}
	
	public function chkLogin ($mail) {
		
		try {
			
			$sql = "SELECT * FROM uc WHERE email = :mail";
			
			$query = $this->conn->prepare($sql);
			$query->execute(array(':mail'=>$mail)); 
			
			if ($query->rowCount() == 0 ) {
				return 0;
			} else {
				return $query->fetchAll(PDO::FETCH_BOTH);
			}
			
			} catch (PDOException $er) {
				echo $er->getMessage();
			}
		}
	}

?>