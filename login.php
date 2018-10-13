<?php
session_start();

$err = "";
if (isset($_POST['btnLogin'])) {
	
	require_once"libs/selectTransaction.php";
	
	$login = new selectTransaction();
	
	$mail = $_POST['mail'];
	$password = $_POST['pass'];
	
	if (empty($mail) || empty($password)){
		
		$err = "<div class = 'alert alert-info'>Fields required!</div>";
	} else {

		$msg = $login->chkLogin($mail);
	
	if (!is_array($msg)) {
		
		$err =  'This user does not exsist.';
		
	} else {
		
		foreach ($msg as $users) {
			
			if (!password_verify($password, $users['password'])) {
				$err =  'Wrong password retry!';
		} else {
				
			$_SESSION['email'] = $users;
		
			header("location:view.php");
		}
	}
}
}
}

?>

<!doctype html>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href = "assets/css/bootstrap.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<h1>Login here</h1>
					
					<?= $err; ?>
					
					<form method="post">
						<input type="email" placeholder="email" name = "mail" class="form-control">
						<br>
						<br>
						<input type="password" placeholder="PassWord" name="pass" class="form-control">
						<br>
						<br>
						<input type="submit" name="btnLogin" value="Login" class="btn btn-primary">
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>