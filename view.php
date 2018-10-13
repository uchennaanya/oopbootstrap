<?php

require_once "session.php";

if (isset($_GET['id'])) {
	
	require_once "libs/deleteTransaction.php";
	
	$delete = new deleteTransaction();
	
	$id = $_GET['id'];
	
	$delete->remove($id);
}

require_once "libs/selectTransaction.php";

$select = new selectTransaction();
$ermsg = "";
$users = $select->selectAll();

?>

<!doctype html>
<html>
	<head>
		<title>View</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href = "assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/animate.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 animate-box">
					<h5><p><a href="changePassword.php">ChangePassword</a> &nbsp;<a href = "logout.php"> LogOut </a> <a href="index.php"><span class="glyphicon glyphicon-envelope"></span> AddNew</a></p></h5>
					<h2>My Dashboard</h2>
					<div class="col-md-2 "></div>
					<input type="text" id="name" placeholder="Search by Name" class="form-control">
					<div class="table-responsive">
					<table class="table">
						<?php
						if ($users == 0) {
								echo '<div> No member yet!</div>'; 
							} else {
						?>
						<tr><th>Sno</th><th colspan="2"> Names </th><th>Email</th><th>Gender</th><th>State</th><th>Date</th><td colspan ="2">Actions</td>

						</tr>

						<?php

							$sno = 0;
							$users = $select->selectAll();

							foreach ($users as $members) {

								$sno++;
							?>
						<tr>

							<td><?= $sno ?></td>
							<td colspan="2">
								<?= $members['fname']; ?>
								<?= $members['sname']; ?>
							</td>

							<td><?= $members['email']; ?></td>
							<td><?= $members['state']; ?></td>
							<td><?= $members['gender']; ?></td>
							<td><?= $members['date']; ?></td>

							<td colspan="2" >
								<a href="edith.php?id=<?=$members['id']; ?>" class="btn btn-primary">Edith</a>
								<a href="?id=<?=$members['id']; ?>" class="btn btn-primary">Delete</a>
							</td>
						</tr>
						<?php } ?>
					</table>
					</div>
					<?php } ?>
				</div>
<!--				<div class="col-md-3"></div>-->
			</div>
			
		</div>
	</body>
</html>