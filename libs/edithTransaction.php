<?php

require_once "server.php";

class edithTransaction extends server {
	
	public function edithUser($fname, $sname, $mail, $gender, $state, $id) {
		try {
			
			$sql = "UPDATE uc SET fname = :fname, sname = :sname, email = :mail, gender = :gender, state = :state WHERE id = :id";
			
			$query = $this->conn->prepare($sql);

			$query->execute(array(':fname'=>$fname, ':sname'=>$sname, ':mail'=>$mail, ':gender'=>$gender, ':state'=>$state, ':id'=>$id));
			
			return 1;
				
			} catch (PDOException $e) {
				
				return $e->getMessage();
			}
		}
	
	public function changePass($pass, $id) {
		try {
			
			$sql = "UPDATE uc SET password = :pass WHERE id = :id";
			
			$query = $this->conn->prepare($sql);

			$query->execute(array(':pass'=>$pass, ':id'=>$id));
			
			return 1;
				
			} catch (PDOException $e) {
				
				return $e->getMessage();
			}
		}
	}
?>