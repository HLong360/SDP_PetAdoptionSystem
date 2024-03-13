<?php
	include("session.php");
	if(isset($_POST["updateBtn"])){
		include("conn.php");

		$sql = "UPDATE pets SET 
		pet_name='$_POST[pet_name]', 
		pet_category='$_POST[pet_category]', 
		pet_age='$_POST[pet_age]', 
		pet_gender='$_POST[gender]', 
		pet_vaccine='$_POST[vaccine]', 
		pet_spayed='$_POST[spayed]', 
		pet_breed='$_POST[pet_breed]',
		pet_condition='$_POST[pet_condition]', 
		pet_color='$_POST[pet_color]',
		pet_fee='$_POST[pet_fee]'

		WHERE pet_id=$_POST[pet_id];";

		if (mysqli_query($con, $sql)) {
		mysqli_close($con);
		echo "<script>alert('Record updated!'); window.location.href='view_pet.php';</script>";
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Pet</title>
<link href="styles/chlstyle.css" rel="stylesheet">
<link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>
<?php
	include("conn.php");
	$id = intval($_GET['pet_id']); 
	$result = mysqli_query($con,"SELECT * FROM pets WHERE pet_id=$id");
	$row = mysqli_fetch_array($result);
	include('checking_header2.php');
?>

<form method="post" >
<input type="hidden" name="pet_id" value="<?php echo $row['pet_id'] ?>">
<div id="container">
<h2>Edit Pet</h2>

	<div class="section">
		<div class="label">
			Pet Name
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["pet_name"] ?>" name="pet_name" required="required">
		</div>
	</div>
	<div class="section" style="padding-top:15px;">
		<div class="label">
			Pet Category
		</div>
		<div class="field">
		<select name="pet_category" required="required">
			<option value="">---Please select---</option>
			<option 
			<?php
			if ($row["pet_category"]=="Cat"){
				echo 'selected="selected"';
			}
			?>				
			value="Cat">Cat</option>
			<option 
			<?php
			if ($row["pet_category"]=="Dog"){
				echo 'selected="selected"';
			}
			?>				
			value="Dog">Dog</option>
			<option 
			<?php
			if ($row["pet_category"]=="Hamster"){
				echo 'selected="selected"';
			}
			?>				
			value="Hamster">Hamster</option>
			<option 
			<?php
			if ($row["pet_category"]=="Rabbit"){
				echo 'selected="selected"';
			}
			?>				
			value="Rabbit">Rabbit</option>
			<option 
			<?php
			if ($row["pet_category"]=="Other"){
				echo 'selected="selected"';
			}
			?>				
			value="Other">Other</option>
			</select>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Age
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["pet_age"] ?>" name="pet_age" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Gender
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="radio" name="gender"
			<?php
			if ($row["pet_gender"]=="Male"){
				echo 'checked="checked"';
			}
			?>			
			value="Male" required="required"> &nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="gender"
			<?php
			if ($row["pet_gender"]=="Female"){
				echo 'checked="checked"';
			}
			?>	
			value="Female" required="required"> &nbsp;&nbsp;Female 
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Vaccine
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="radio" name="vaccine"
			<?php
			if ($row["pet_vaccine"]=="Yes"){
				echo 'checked="checked"';
			}
			?>			
			value="Yes" required="required"> &nbsp;&nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="vaccine"
			<?php
			if ($row["pet_vaccine"]=="No"){
				echo 'checked="checked"';
			}
			?>	
			value="No" required="required"> &nbsp;&nbsp;No 
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Spayed
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="radio" name="spayed"
			<?php
			if ($row["pet_spayed"]=="Yes"){
				echo 'checked="checked"';
			}
			?>			
			value="Yes" required="required"> &nbsp;&nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="spayed"
			<?php
			if ($row["pet_spayed"]=="No"){
				echo 'checked="checked"';
			}
			?>	
			value="No" required="required"> &nbsp;&nbsp;No 
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Breed
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["pet_breed"] ?>" name="pet_breed" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Condition
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["pet_condition"] ?>" name="pet_condition" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Color
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["pet_color"] ?>" name="pet_color" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Adoption Fee
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["pet_fee"] ?>" name="pet_fee" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			&nbsp;
		</div>
		<div class="field">
			<button type="submit" class="btn" name="updateBtn">Update</button>
		</div>
	</div>
</div>
</form>
<?php
	include('footer.html');
	mysqli_close($con);
?>
</body>
</html>
