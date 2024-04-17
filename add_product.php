<?php
	require('connection.php');
	session_start();
	
	$user_first_name = $_SESSION['user_first_name'];
	$user_last_name = $_SESSION['user_last_name'];
	
	if(!empty($user_first_name) && !empty($user_last_name) ){
?>

 <!DOCTYPE html>
 
 <html>
	<head>
		<title>List of Category</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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

						<div class="container">
				

						<?php
			if(isset($_GET['product_name'])){
				$product_name 		= $_GET['product_name'];
				$product_category 	= $_GET['product_category'];
				$prdouct_code 		= $_GET['prdouct_code'];
				$prdocut_entry_date = $_GET['prdocut_entry_date'];
				
				$sql =  "INSERT INTO product (product_name, product_category, prdouct_code, prdocut_entry_date) 
						 VALUES ('$product_name', '$product_category', '$prdouct_code', '$prdocut_entry_date')";
						
				if($conn->query($sql) == TRUE){
					echo 'Data Inserted!';
				}else{
					echo 'Data not Inserted!';
				}
				
			}
			
		?>
	
		<?php
			$sql = "SELECT * FROM category";
			$query = $conn->query($sql);
			
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			Product :<br>
			<input type="text" name="product_name"><br><br>
			Product Category :<br>
			<select name="product_category">
				<?php
					while($data = mysqli_fetch_array($query)){
						$category_id = $data['category_id'];
						$category_name = $data['category_name'];
						
						echo "<option value='$category_id'>$category_name</option>";
					}
				?>
			</select><br><br>
			Product Code :<br>
			<input type="text" name="prdouct_code"><br><br>
			Product Entry Date :<br>
			<input type="date" name="prdocut_entry_date"><br><br>
			<input type="submit" value="submit">
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
	}else{
		header('location:login.php');
	}
?>