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


						<?php
						$sql = "SELECT * FROM users";

						$query = $conn->query($sql);
						echo "<table class='table table-success table-striped table-hover my-5'><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th></tr>";
						while ($data = mysqli_fetch_assoc($query)) {
							$user_id = $data['user_id'];
							$user_first_name = $data['user_first_name'];
							$user_last_name = $data['user_last_name'];
							$user_email = $data['user_email'];

							echo "<tr>
						<td>$user_first_name</td>
						<td>$user_last_name</td>
						<td>$user_email</td>
						<td><a href='edit_users.php?id=$user_id'>Edit</a></td>
					</tr>";
						}
						echo "</table>";
						?>



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