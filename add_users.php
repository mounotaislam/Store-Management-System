<?php
require('connection.php');
session_start();

$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];

if (!empty($user_first_name) && !empty($user_last_name)) {
	?>

	<!DOCTYPE html>

	<html>

	<head>
		<title>List of Category</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
			integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	</head>

	<body>
		<div class="container bg-light">
			<div class="container-foulid border-bottom border-success"><!--topbar-->
				<?php include('topbar.php'); ?>
			</div><!--@end topbar-->
			<div class="container-foulid">
				<div class="row">
					<div class="col-sm-3 bg-light p-0 m-0"><!--left bar-->
						<?php include('leftbar.php'); ?>
					</div><!--@end of left-->
					<div class="col-sm-9 border-start border-success"><!--right bar-->

						<div class="container my-5">
							<?php
							if (isset($_GET['user_first_name'])) {
								$user_first_name = $_GET['user_first_name'];
								$user_last_name = $_GET['user_last_name'];
								$user_email = $_GET['user_email'];
								$user_password = $_GET['user_password'];

								$sql = "INSERT INTO users (user_first_name, user_last_name, user_email, user_password) 
						 VALUES ('$user_first_name', '$user_last_name', '$user_email', '$user_password')";

								if ($conn->query($sql) == TRUE) {
									echo 'Data Inserted!';
								} else {
									echo 'Data not Inserted!';
								}

							}

							?>

							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
								User's First Name :<br>
								<input type="text" name="user_first_name" class="form-control"><br><br>
								User's Last Name :<br>
								<input type="text" name="user_last_name" class="form-control"><br><br>
								User's Email :<br>
								<input type="email" name="user_email" class="form-control"><br><br>
								User's Password :<br>
								<input type="password" name="user_password" class="form-control"><br><br>
								<input type="submit" value="submit" class="form-control btn-success">
							</form>


						</div>




					</div><!--@end of right-->
				</div><!--@end of row-->
			</div>
			<div class="container-foulid border-top border-success">
				<?php include('bottombar.php'); ?>
			</div>
		</div><!--@end of container-->
	</body>

	</html>
	<?php
} else {
	header('location:login.php');
}
?>