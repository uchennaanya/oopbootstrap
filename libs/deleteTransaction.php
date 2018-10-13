<?php

require_once "server.php";

class deleteTransaction extends server {
	
	public function remove($id) {
		try {
			
			$sql = "DELETE FROM uc WHERE id = :id";
			$query = $this->conn->prepare($sql);
			$query->execute(array(':id'=>$id));
			 return true;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}

?>