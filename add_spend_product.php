  <?php
	require('connection.php');
	require('myfunction.php');

	session_start();
	
	$user_first_name = $_SESSION['user_first_name'];
	$user_last_name = $_SESSION['user_last_name'];
	
	if(!empty($user_first_name) && !empty($user_last_name) ){		
?>


 <!DOCTYPE html>
 
 <html>
	<head>
		<title>Spend Product</title>
	</head>
	<body>
		<?php
			if(isset($_GET['spend_product_name'])){
				$spend_product_name 		= $_GET['spend_product_name'];
				$spend_product_quentity 	= $_GET['spend_product_quentity'];
				$spend_product_entry_date 	= $_GET['spend_product_entry_date'];
				
				$sql =  "INSERT INTO spend_product (spend_product_name, spend_product_quentity, spend_product_entry_date) 
						 VALUES ('$spend_product_name', '$spend_product_quentity', '$spend_product_entry_date')";
						
				if($conn->query($sql) == TRUE){
					echo 'Data Inserted!';
				}else{
					echo 'Data not Inserted!';
				}
				
			}
			
		?>
	
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			
			Product :<br>
			<select name="spend_product_name">
				<?php
					data_list('product', 'prdouct_id', 'product_name');
				?>
			</select><br><br>
			Product Quentity :<br>
			<input type="text" name="spend_product_quentity"><br><br>
			Spend Entry Date :<br>
			<input type="date" name="spend_product_entry_date"><br><br>
			<input type="submit" value="submit">
		</form>
	</body>
 </html>
 <?php
	}else{
		header('location:login.php');
	}
?>