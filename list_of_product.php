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

					<?php	
	$sql1 = "SELECT * FROM category";
	$query1 = $conn->query($sql1);
	
	$data_list = array();
	
	while($data1 = mysqli_fetch_assoc($query1)){
		$category_id 	= $data1['category_id'];
		$category_name = $data1['category_name'];
		
		$data_list[$category_id] = $category_name;
	}
	

?>

 <!DOCTYPE html>
 
 <html>
	<head>
		<title>List of Product</title>
	</head>
	<body>
		<?php
			$sql = "SELECT * FROM product";
			
			$query = $conn->query($sql);
			echo "<table class='table table-success table-striped table-hover my-5'><th>Product Name</th><th>Category</th><th>Code</th><th>Action</th></tr>";
			while($data = mysqli_fetch_assoc($query)){
				$prdouct_id 		= $data['prdouct_id'];
				$product_name 		= $data['product_name'];
				$product_category 	= $data['product_category'];
				$prdouct_code 		= $data['prdouct_code'];
				
				echo "<tr>
						<td>$product_name</td>
						<td>$data_list[$product_category]</td>
						<td>$prdouct_code</td>
						<td><a href='edit_product.php?id=$prdouct_id'>Edit</a></td>
					</tr>";
			}
			echo "</table>";
		?>
	
		
	</body>
 </html>



					
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