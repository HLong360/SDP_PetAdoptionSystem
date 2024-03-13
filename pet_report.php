<?php
	include('session.php');
?>
<html>

<head>
	<title>Pet Report</title>
	<link rel="stylesheet" href="styles/admin_styles.css?v=<?php echo time(); ?>">
	<link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>
<?php include('checking_header2.php'); ?>

<h1> Pet Report </h1>
<br>
<?php 
	
		$mysqli = new mysqli('localhost', 'root', '','sdp_pet_adoption') or die(mysli_error($mysqli));
		$result = $mysqli->query('SELECT * FROM pets') or die ($mysqli->error);
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		?>













	<table>
	<h2> All Pets </h2>
		<th> Pet Name </th>
		<th> Type	</th>
		<th> Age	</th>
		<th> Gender	</th>
		<th> Breed	</th>
		<th> Vaccine	</th>
		<th> Spayed	</th>
		<th> Condition	</th>
		<th> Color	</th>
		<th> Date	</th>
		<th> Fee	</th>
		<th> Adoption Status	</th>
	
	<?php
			while ($row = $result-> fetch_assoc()): ?>
	
	
	
		<tr>
		
			<td> <?php echo $row['pet_name']; ?>	</td>
			<td><?php echo $row['pet_category']; ?>	</td>
			<td><?php echo $row['pet_age']; ?>	</td>
			<td><?php echo $row['pet_gender']; ?>	</td>
			<td><?php echo $row['pet_breed']; ?>	</td>
			<td><?php echo $row['pet_vaccine']; ?>	</td>
			<td><?php echo $row['pet_spayed']; ?>	</td>
			<td><?php echo $row['pet_condition']; ?>	</td>
			<td><?php echo $row['pet_color']; ?>	</td>
			<td><?php echo $row['pet_date']; ?>	</td>
			<td><?php echo $row['pet_fee']; ?>	</td>
			<td><?php echo $row['adopt_status']; ?></td>
		
		
		
		</tr>
		
	
	<?php endwhile; ?>
	
	
	
	
	
	</table>
	<br><br>


	<h2> Dogs Report </h2>


	<?php 
	
		$mysqli = new mysqli('localhost', 'root', '','sdp_pet_adoption') or die(mysli_error($mysqli));
		$result = $mysqli->query('SELECT * FROM `pets` WHERE pet_category = "Dog"') or die ($mysqli->error);
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		
		
	?>






	<table>	
	
	
	
		<th> Pet Name </th>
		<th> Type	</th>
		<th> Age	</th>
		<th> Gender	</th>
		<th> Breed	</th>
		<th> Vaccine	</th>
		<th> Spayed	</th>
		<th> Condition	</th>
		<th> Color	</th>
		<th> Date	</th>
		<th> Fee	</th>
		<th> Adoption Status	</th>
	
	
	
	
	


	<?php
			while ($row = $result-> fetch_assoc()): ?>
		<tr>	
			
			<td> <?php echo $row['pet_name']; ?>	</td>
			<td><?php echo $row['pet_category']; ?>	</td>
			<td><?php echo $row['pet_age']; ?>	</td>
			<td><?php echo $row['pet_gender']; ?>	</td>
			<td><?php echo $row['pet_breed']; ?>	</td>
			<td><?php echo $row['pet_vaccine']; ?>	</td>
			<td><?php echo $row['pet_spayed']; ?>	</td>
			<td><?php echo $row['pet_condition']; ?>	</td>
			<td><?php echo $row['pet_color']; ?>	</td>
			<td><?php echo $row['pet_date']; ?>	</td>
			<td><?php echo $row['pet_fee']; ?>	</td>
			<td><?php echo $row['adopt_status']; ?></td>
	
		
		</tr>
		
	<?php endwhile; ?>



















	</table>
	<br><br>




<h2> Cats Report </h2>


	<?php 
	
		$mysqli = new mysqli('localhost', 'root', '','sdp_pet_adoption') or die(mysli_error($mysqli));
		$result = $mysqli->query('SELECT * FROM `pets` WHERE pet_category = "Cat"') or die ($mysqli->error);
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		
		
	?>






	<table>	
	
	
	
		<th> Pet Name </th>
		<th> Type	</th>
		<th> Age	</th>
		<th> Gender	</th>
		<th> Breed	</th>
		<th> Vaccine	</th>
		<th> Spayed	</th>
		<th> Condition	</th>
		<th> Color	</th>
		<th> Date	</th>
		<th> Fee	</th>
		<th> Adoption Status	</th>
	
	
	
	
	


	<?php
			while ($row = $result-> fetch_assoc()): ?>
		<tr>	
			
			<td> <?php echo $row['pet_name']; ?>	</td>
			<td><?php echo $row['pet_category']; ?>	</td>
			<td><?php echo $row['pet_age']; ?>	</td>
			<td><?php echo $row['pet_gender']; ?>	</td>
			<td><?php echo $row['pet_breed']; ?>	</td>
			<td><?php echo $row['pet_vaccine']; ?>	</td>
			<td><?php echo $row['pet_spayed']; ?>	</td>
			<td><?php echo $row['pet_condition']; ?>	</td>
			<td><?php echo $row['pet_color']; ?>	</td>
			<td><?php echo $row['pet_date']; ?>	</td>
			<td><?php echo $row['pet_fee']; ?>	</td>
			<td><?php echo $row['adopt_status']; ?></td>
	
		
		</tr>
		
	<?php endwhile; ?>



















	</table>
	<br><br>





	<h2> Rabbits Report </h2>


	<?php 
	
		$mysqli = new mysqli('localhost', 'root', '','sdp_pet_adoption') or die(mysli_error($mysqli));
		$result = $mysqli->query('SELECT * FROM `pets` WHERE pet_category = "Rabbit"') or die ($mysqli->error);
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		
		
	?>






	<table>	
	
	
	
		<th> Pet Name </th>
		<th> Type	</th>
		<th> Age	</th>
		<th> Gender	</th>
		<th> Breed	</th>
		<th> Vaccine	</th>
		<th> Spayed	</th>
		<th> Condition	</th>
		<th> Color	</th>
		<th> Date	</th>
		<th> Fee	</th>
		<th> Adoption Status	</th>
	
	
	
	
	


	<?php
			while ($row = $result-> fetch_assoc()): ?>
		<tr>	
			
			<td> <?php echo $row['pet_name']; ?>	</td>
			<td><?php echo $row['pet_category']; ?>	</td>
			<td><?php echo $row['pet_age']; ?>	</td>
			<td><?php echo $row['pet_gender']; ?>	</td>
			<td><?php echo $row['pet_breed']; ?>	</td>
			<td><?php echo $row['pet_vaccine']; ?>	</td>
			<td><?php echo $row['pet_spayed']; ?>	</td>
			<td><?php echo $row['pet_condition']; ?>	</td>
			<td><?php echo $row['pet_color']; ?>	</td>
			<td><?php echo $row['pet_date']; ?>	</td>
			<td><?php echo $row['pet_fee']; ?>	</td>
			<td><?php echo $row['adopt_status']; ?></td>
	
		
		</tr>
		
	<?php endwhile; ?>



















	</table>
	<br><br>

	
	
	<h2> Hamsters Report </h2>


	<?php 
	
		$mysqli = new mysqli('localhost', 'root', '','sdp_pet_adoption') or die(mysli_error($mysqli));
		$result = $mysqli->query('SELECT * FROM `pets` WHERE pet_category = "Hamster"') or die ($mysqli->error);
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		
		
	?>






	<table>	
	
	
	
		<th> Pet Name </th>
		<th> Type	</th>
		<th> Age	</th>
		<th> Gender	</th>
		<th> Breed	</th>
		<th> Vaccine	</th>
		<th> Spayed	</th>
		<th> Condition	</th>
		<th> Color	</th>
		<th> Date	</th>
		<th> Fee	</th>
		<th> Adoption Status	</th>
	
	
	
	
	


	<?php
			while ($row = $result-> fetch_assoc()): ?>
		<tr>	
			
			<td> <?php echo $row['pet_name']; ?>	</td>
			<td><?php echo $row['pet_category']; ?>	</td>
			<td><?php echo $row['pet_age']; ?>	</td>
			<td><?php echo $row['pet_gender']; ?>	</td>
			<td><?php echo $row['pet_breed']; ?>	</td>
			<td><?php echo $row['pet_vaccine']; ?>	</td>
			<td><?php echo $row['pet_spayed']; ?>	</td>
			<td><?php echo $row['pet_condition']; ?>	</td>
			<td><?php echo $row['pet_color']; ?>	</td>
			<td><?php echo $row['pet_date']; ?>	</td>
			<td><?php echo $row['pet_fee']; ?>	</td>
			<td><?php echo $row['adopt_status']; ?></td>
	
		
		</tr>
		
	<?php endwhile; ?>
	


	




	</table>
	<br><br>

	<h2> Pet Adoption Report </h2>


	<?php 

		$mysqli = new mysqli('localhost', 'root', '','sdp_pet_adoption') or die(mysli_error($mysqli));
		$result = $mysqli->query("SELECT p.*, c.Username FROM pets p INNER JOIN adopted_pet ap ON p.pet_id = ap.pet_id INNER JOIN customers c ON c.Id = ap.Id") or die ($mysqli->error);
		//pre_r($result);
		//pre_r($result->fetch_assoc());
		
		
	?>






	<table>	



		<th> Pet Name </th>
		<th> Type	</th>
		<th> Age	</th>
		<th> Gender	</th>
		<th> Breed	</th>
		<th> Vaccine	</th>
		<th> Spayed	</th>
		<th> Condition	</th>
		<th> Color	</th>
		<th> Date	</th>
		<th> Fee	</th>
		<th> Adoption Status	</th>
		<th> Adopted By	</th>







	<?php
			while ($row = $result-> fetch_assoc()): ?>
		<tr>	
			
			<td> <?php echo $row['pet_name']; ?>	</td>
			<td><?php echo $row['pet_category']; ?>	</td>
			<td><?php echo $row['pet_age']; ?>	</td>
			<td><?php echo $row['pet_gender']; ?>	</td>
			<td><?php echo $row['pet_breed']; ?>	</td>
			<td><?php echo $row['pet_vaccine']; ?>	</td>
			<td><?php echo $row['pet_spayed']; ?>	</td>
			<td><?php echo $row['pet_condition']; ?>	</td>
			<td><?php echo $row['pet_color']; ?>	</td>
			<td><?php echo $row['pet_date']; ?>	</td>
			<td><?php echo $row['pet_fee']; ?>	</td>
			<td><?php echo $row['adopt_status']; ?></td>
			<td><?php echo $row['Username']; ?></td>

		
		</tr>
		
		<?php endwhile; ?>

	</table>




	<?php include('footer.html'); ?>
</body>

</html>