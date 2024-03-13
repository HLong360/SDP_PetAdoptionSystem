<?php
	include('session.php');
?>
<html>



<head>
<title>Manage Customer</title>
<link rel="stylesheet" href="styles/admin_styles.css?v=<?php echo time(); ?>">
<link href="styles/HF1_style.css" rel="stylesheet">


</head>

<body>
<?php include('checking_header2.php'); ?>
<h1> Managing Customers </h1>
<br>
	<?php require_once "manage_process.php";?>
	
	
		<?php 
	
		$mysqli = new mysqli('localhost', 'root', '','sdp_pet_adoption') or die(mysli_error($mysqli));
		$result = $mysqli->query('SELECT * FROM customers') or die ($mysqli->error);
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		?>
		
		


	<div class ="content">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th> Name </th>
						<th> Gender </th>
						<th> Phone </th>
						<th> Email </th>
						<th> Address </th>
						
						<th colspan="10" > Action  </th>
					</tr>
				</thead>
				
		<?php
			while ($row = $result-> fetch_assoc()): ?>
				<tr>
					<td> <?php echo $row['Id']; ?> </td>
					<td> <?php echo $row['Name']; ?> </td>
					<td> <?php echo $row['Gender']; ?> </td>
					<td> <?php echo $row['Phone']; ?> </td>
					<td> <?php echo $row['Email']; ?> </td>
					<td> <?php echo $row['Address']; ?> </td>
					
					
					
					<td>
						<a href="Manage_customers.php?edit=<?php echo $row['Id']; ?>"
							<button id="edit" type='Button'> Edit </button>
						</a>
					</td>
				</tr>
			<?php endwhile; ?>
				
				
				
			</table>
				
		</div>
		
		
		
		<?php
		
		function pre_r( $array ) {
			echo '<pre>';
			print_r($array);
			echo '</pre>';
			
			
			
		}
		
	
	
	?>




	<br><br>
	<h3>Please click 'edit' from the table above to edit customer's information</h3>
	<form action="manage_process.php" method="POST">
	<input type="hidden" id="id" name = "id" value = "<?php echo $id;?> ">
		
		
		<div>
			<label>Full Name</label><br>
			
			<input type="text" id='Name' name='Name' placeholder="Full name" value = "<?php echo $name; ?>"  >
		
		</div>
		
		<br>
		
		<div>
			<label>Gender</label><br>
			
			<!-- <input type="text" id='Gender' name='Gender' placeholder="Gender" value = "<?php echo $gender; ?>"  > -->
			<input type="radio" id='Gender' name='Gender' <?php if($gender == 'Male'){echo "checked='checked'";} ?>
			value='Male'>&nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" id='Gender' name='Gender' <?php if($gender == 'Female'){echo "checked='checked'";} ?>
			value='Female'>&nbsp;&nbsp;Female
		
		</div>
		
		<br>
		
		<div>
			<label>Phone Number</label><br>
			
			<input type="text" id='Phone' name='Phone' placeholder="Phone Number" value = "<?php echo $phone; ?>"  >
		
		</div>
		
		<br>
		
		<div>
			<label>Email</label><br>
			
			<input type="text" id='Email' name='Email' placeholder="Email" value = "<?php echo $email; ?>"  >
		
		</div>
		
		<br>
		
		<div>
			<label>Address</label><br>
			
			<input type="text" id='Address' name='Address' placeholder="Address" value = "<?php echo $address; ?>"  >
		
		</div>
		
		<br>
		
		<div>
		
		 <input type="submit" value="Submit" name="update">
		
		</div>

			
	
	
	
	
	
	
	
	
	
	
	</form>












	<?php include('footer.html'); ?>
</body>






</html>



