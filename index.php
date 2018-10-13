<?php
$ersname = $erfname = $ermail = $erpass = $ergender = $erstate = $msg = "";
if (isset($_POST['btn_reg'])) {
	
	require_once "libs/insertTransaction.php";
	
	$insert = new insertTransaction();
	
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$gender = $_POST['gender'];
	$state = $_POST['state'];
	
	$password = password_hash($pass, PASSWORD_DEFAULT);
	$date = new dateTime();
	
	if (empty($fname) or !preg_match("/^[a-zA-Z]*$/", $fname)) {
		
		$erfname = "Please check your input";
	} else if (empty($sname) or !preg_match("/^[a-zA-Z]*$/", $sname)) {
		
		$ersname = 'Check your data!';
	} else if (empty($mail) or !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		
		$ermail = 'Check the email provided';
	} else if (empty($pass) or !preg_match("/^[a-zA-Z0-9]*$/", $pass)) {
		
		$erpass = 'Password Required!';
	} else if (empty($gender) or !preg_match("/^[a-zA-Z]*$/", $gender)) {
		
		$ergender = "Your gender please";
	} else if (empty($state) or !preg_match("/^[a-zA-Z]*$/", $state)) {
		
		$erstate = "State of origin required";
	} else {
		
		$msg = $insert->saveRecord($fname, $sname, $mail, $password, $gender, $state, $date->format('y:m:d:h:i:s')) ;
	}
}

?>
<!doctype html>
<html>
	<head>
		<title>Regiter</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="container">
			<div class="row">
		<p></p>
		<div class="col-md-3"></div>
		<div class="col-md-6 animate-box">
			<h2 style="display: inline">Register here</h2> &nbsp; <a href="login.php">Login</a><p></p>
			 <?= $msg; ?>
		<form method = "post">
			<div class="row form-group">
				<div class="col-md-12">
					<input type="text" name="fname" placeholder="FirstName" class="form-control">
					<?php echo $erfname; ?>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<input type="text" name="sname" placeholder="LastName" class="form-control">
			<?php echo $ersname; ?>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
			<input type="email" placeholder="email" name="mail" class="form-control">
			
			<?php echo $ermail; ?>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
			<input type="password" name="pass" placeholder="Password" class="form-control">
			
			<?php echo $erpass; ?>
				</div>
			</div>
			
			<div class="row form-group">
				<p></p>
				<div class="col-md-6">
			<select name="gender" class="form-control">
				<option selected> Select your Gender </option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
				</div>
			<?=  $ergender; ?>
			<p></p>
				<div class="col-md-6">
				 <select name="state" class="form-control" id="state" >
					<option selected> Select your State </option>
					<option value="abia">Abia</option>
					<option value="adamawa">Adamawa</option>
					<option value="akwa Ibom">Akwa Ibom</option> 
					<option value="anambara">Anambra</option> 
					<option value="bauchi">Bauchi</option> 
					<option value="bayelsa">Bayelsa</option> 
					<option value="benue">Benue</option> 
					<option value="borno">Borno</option> 
					<option value="cross River">Cross River</option> 
					<option value="delta">Delta</option> 
					<option value="ebonyi">Ebonyi</option> 
					<option value="edo">Edo</option> 
					<option value="ekiti">Ekiti</option> 
					<option value="enugu">Enugu</option> 
					<option value="gombe">Gombe</option> 
					<option value="imo">Imo</option> 
					<option value="jigawa">Jigawa</option> 
					<option value="kaduna">Kaduna</option> 
					<option value="kano">Kano</option> 
					<option value="katsina">Katsina</option> 
					<option value="kebbi">Kebbi</option> 
					<option value="kogi">Kogi</option> 
					<option value="kwara">Kwara</option> 
					<option value="lagos">Lagos</option> 
					<option value="nassarawa">Nassarawa</option> 
					<option value="niger">Niger</option> 
					<option value="ogun">Ogun</option> 
					<option value="ondo">Ondo</option> 
					<option value="osun">Osun</option> 
					<option value="oyo">Oyo</option> 
					<option value="plateau">Plateau</option> 
					<option value="rivers">Rivers</option> 
					<option value="sokoto">Sokoto</option> 
					<option value="taraba">Tabara</option> 
					<option value="yobe">Yobe</option>
					<option value="zamfara">Zamfara</option>
				</select>
			
			<?=  $erstate; ?>
				</div>
			</div>
				<input type="submit" value="Register" class="btn btn-primary" name = "btn_reg">
		</form>
		</div>
		</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>