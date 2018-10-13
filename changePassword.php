<?php

session_start();

if (!isset($_SESSION['email'])) {
	
	header("location:login.php");
}

$users = $_SESSION['email'];

$err = "";

if (isset($_POST['btnChange'])) {
	
	require_once "libs/selectTransaction.php";
	require_once "libs/edithTransaction.php";
	
	$select = new selectTransaction;
	$change = new edithTransaction;
	
	$cpassword = $_POST['cpass'];
	$password = $_POST['pass'];
	$rpassword = $_POST['rpass'];
	
	if ($password !== $rpassword) {
		
		$err = "<div class = 'alert alert-info'>Password must match, try again.</div>";
		
	} elseif (empty($password) || !preg_match("/^[a-zA-Z0-9]*$/", $password)) {
		
		$err = "<div class = 'alert alert-info'>Password required! and no special chars!</div>";
	} else {
		
		$response = $select->chkLogin($users['email']);
		if (!is_array($response)) {
			
			$err = "<div class = 'alert alert-info'>User does not exsist.</div>";
		} else {
			
			if (!password_verify($cpassword, $users['password'])) {
				
				$err = "<div class = 'alert alert-info'>Invalid Current password!</div>";	
			} else {
				$password = password_hash($password, PASSWORD_DEFAULT);
				
				$response = $change->changePass($password, $users['id']);
				
				if ($response == 1) {
					
					$err = "<div class = 'alert alert-info'>Paassword is changed.</div>"."<a href = 'login.php'>Login</a>";
				} else {
					echo 'oops something is wrong.';
				}
			}
		}
	}
}

?>

<!doctype html>
<html>
	<head>
		<title>CpangePassword</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href = "assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3 animate-box"></div>
				<div class="col-md-6 animate-box">
					<h1>ChangePassword</h1>
					<?= $err; ?>
					<p>
						<a href="login.php" class="btn btn-warning">Back</a>
					</p>
					
					<form method="post">
						<input type="password" placeholder="Current Password" name = "cpass" class="form-control">
						<br>
						<br>
						<input type="password" placeholder="New PassWord" name="pass" class="form-control">
						<br>
						<br>
						<input type="password" placeholder="New PassWord" name = "rpass" class="form-control">
						<br>
						<br>
						<input type="submit" value = "Changeassword" name="btnChange" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
	</body>
</html>