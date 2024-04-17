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
		<title>Store Product</title>
	</head>
	<body>
		<?php
			if(isset($_GET['store_product_name'])){
				$store_product_name 		= $_GET['store_product_name'];
				$store_product_quentity 	= $_GET['store_product_quentity'];
				$store_product_entry_date 	= $_GET['\store_product_entry_date'];
				
				$sql =  "INSERT INTO store_product (store_product_name, store_product_quentity, store_product_entry_date) 
						 VALUES ('$store_product_name', '$store_product_quentity', '$store_product_entry_date')";
						
				if($conn->query($sql) == TRUE){
					echo 'Data Inserted!';
				}else{
					echo 'Data not Inserted!';
				}
				
			}
			
		?>
	
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			
			Product :<br>
			<select name="store_product_name">
				<?php
					data_list('product', 'prdouct_id', 'product_name');
				?>
			</select><br><br>
			Product Quentity :<br>
			<input type="text" name="store_product_quentity"><br><br>
			Store Entry Date :<br>
			<input type="date" name="store_product_entry_date"><br><br>
			<input type="submit" value="submit">
		</form>
	</body>
 </html>
 <?php
	}else{
		header('location:login.php');
	}
?>