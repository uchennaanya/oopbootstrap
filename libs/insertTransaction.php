<?php

require_once ("server.php");

class insertTransaction extends server {
	
	public function saveRecord($fname, $sname, $mail, $pass, $gender, $state, $date) {
		
		try {
		
		$sql = "INSERT INTO uc(fname, sname, email, password, gender, state, date) VALUES (:fname, :sname, :mail, :pass, :gender, :state, :date)";
		
		$query = $this->conn->prepare($sql);
			
		$query->execute(array(':fname'=>$fname, 'sname'=>$sname, ':pass'=>$pass, ':mail'=>$mail, ':gender'=>$gender, ':state'=>$state, ':date'=>$date));
			
		return "<div class = 'alert alert-info' style = 'display: inline-block;'>Thanks for joining us! your registration ID is " . $this->conn->lastInsertId()." ". "<a href = 'view.php'>ViewRecord</a></div>";
		
		} catch (PDOException $e) {

			echo $e->getMessage();
		}
	}
}

?>