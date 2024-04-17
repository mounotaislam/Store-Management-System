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
		<title>Edit Product</title>
	</head>
	<body>
		<?php
			if(isset($_GET['id'])){
				$getid = $_GET['id'];
				
				$sql = "SELECT * FROM product WHERE prdouct_id=$getid";
				
				$query = $conn->query($sql);
				
				$data = mysqli_fetch_assoc($query);
				
				$prdouct_id 		= $data['prdouct_id'];
				$product_name 		= $data['product_name'];
				$product_category 	= $data['product_category'];
				$prdouct_code 		= $data['prdouct_code'];
				$prdocut_entry_date = $data['prdocut_entry_date'];
			}
			
			if(isset($_GET['product_name'])){
				$new_product_name 		= $_GET['product_name'];
				$new_product_category 	= $_GET['product_category'];
				$new_prdouct_code 		= $_GET['prdouct_code'];
				$new_prdocut_entry_date = $_GET['prdocut_entry_date'];
				$new_prdouct_id 		= $_GET['prdouct_id'];
				
				$sql1 = "UPDATE product SET product_name='$new_product_name',
							product_category='$new_product_category', 
							prdouct_code='$new_prdouct_code', 
							prdocut_entry_date='$new_prdocut_entry_date' 
							WHERE prdouct_id = $new_prdouct_id";
							
				if($conn->query($sql1) == TRUE){
					echo 'Update Successful!';
				}else{
					echo "Error updating record: " . $conn->error;
				}
			}
			
		?>
	
		<?php
			$sql = "SELECT * FROM category";
			$query = $conn->query($sql);
			
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			Product :<br>
			<input type="text" name="product_name" value="<?php echo $product_name ?>"><br><br>
			Product Category :<br>
			<select name="product_category">
				<?php
					while($data = mysqli_fetch_array($query)){
						$category_id = $data['category_id'];
						$category_name = $data['category_name'];
				?>
				<option value='<?php echo $category_id ?>' <?php if($category_id == $product_category){ echo 'selected';} ?> >
					<?php echo $category_name?>
				</option>
				<?php	}	?>
			</select><br><br>
			Product Code :<br>
			<input type="text" name="prdouct_code" value="<?php echo $prdouct_code ?>"><br><br>
			Product Entry Date :<br>
			<input type="date" name="prdocut_entry_date" value="<?php echo $prdocut_entry_date ?>"><br><br>
			<input type="text" name="prdouct_id" value="<?php echo $prdouct_id ?>" hidden>
			<input type="submit" value="submit">
		</form>
	</body>
 </html>
 <?php
	}else{
		header('location:login.php');
	}
?>