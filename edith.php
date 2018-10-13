<?php 

require_once "session.php";
require_once('libs/selectTransaction.php');

$id = $_GET['id'];

$select = new selectTransaction();
$ermail = $erfname = $ersname = $ergender = $erstate = "";
if (isset($_POST['btnEdith'])) {
	
	require_once "libs/edithTransaction.php";
	$edith = new edithTransaction();
	
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	$mail = $_POST['mail'];
	$gender = $_POST['gender'];
	$state = $_POST['state'];
	
	if(empty($fname) || !preg_match("/^[a-zA-Z]*$/", $fname )) {
		
		$erfname = 'Fname required and must be a string';
	} else if(empty($sname) || !preg_match("/^[a-zA-Z]*$/", $sname)) {
		
		$ersname = 'Sname required and must be a string';
	} elseif (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		
		$ermail = 'A valid mail required please';
	} elseif (empty($gender) || !preg_match("/^[a-zA-Z]*$/", $gender)) {
		
		$ergender = 'Sex required!';
	} elseif (empty($state) || !preg_match("/^[a-zA-Z]*$/", $state)){
		
		echo 'State required.';

	} else {
		
		$edith->edithUser($fname, $sname, $mail, $gender, $state, $id);
	}
	header("location:view.php");
}

?>
<!doctype html>
<html>
	<head>
		<title>Edith</title>
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
					<h2> Edith User </h2>
					<form method = "post">
						<?php

						$selects = $select->selectUser($id);

						foreach ($selects as $user){

						?>
						<input type="text" name="fname" value = "<?= $user['fname']; ?>" placeholder="Fname" class="form-control">
						<br>
						<?= $erfname ?>
						<br>
						<input type="text" name="sname" value = "<?= $user['sname']; ?>" placeholder="Sname" class="form-control">
						<br>
						<?= $ersname ?>
						<br>
						<input type="text" name="mail" value = "<?= $user['email']; ?>" placeholder="Email" class="form-control">
						<br>
						<?= $ermail ?>
						<br>
						<div class="row form-group">
				<p></p>
				<div class="col-md-6">
			<select name="gender" class="form-control">
				<option value="Male"><?= $user['gender']; ?></option>
				<option value="Female">Female</option>
			</select>
				</div>
			<?=  $ergender; ?>
			<p></p>
				<div class="col-md-6">
				 <select name="state" class="form-control" id="state" >
					<option value="abia"><?= $user['state']; ?></option>
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
						<?= $erstate ?>
						<br>
						<input type="submit" name = "btnEdith" value="Update" class="btn btn-primary">
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
		
	</body>
</html>