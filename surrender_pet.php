<?php
$name111 = "TL's friend";

$abc = "hello world, $name111";

echo $abc;
include("session.php");
 if (isset($_POST['submitBtn'])) {
	include("conn.php");
	
	$target_dir = "petsImg/";
	$target_file = $target_dir . basename($_FILES["pet_pic"]["name"]);

	if (move_uploaded_file($_FILES["pet_pic"]["tmp_name"], $target_file)) 

	{
		$file_name = basename($_FILES["pet_pic"]["name"]);

		$sql="INSERT INTO pets (pet_name, pet_category, pet_age, pet_gender, pet_breed, pet_vaccine, pet_spayed, pet_condition, pet_color, pet_date, pet_fee, pet_pic, adopt_status) 
		VALUES (\"$_POST[pet_name]\",'$_POST[pet_category]','$_POST[pet_age]','$_POST[gender]','$_POST[pet_breed]','$_POST[vaccine]','$_POST[spayed]','$_POST[pet_condition]','$_POST[pet_color]',NOW(),'$_POST[pet_fee]','$file_name','No')";
		

		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		else {
			echo '<script>alert("1 pet added!");
			window.location.href= "Home.php";
			</script>';
		}
	}

	mysqli_close($con);
 }
?>

<!DOCTYPE html>
<html>
<head>
<title>Add New Pet</title>
<link href="styles/chlstyle.css" rel="stylesheet">
<link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>
<?php include('checking_header2.php'); ?>
<form action="#" method="post" enctype="multipart/form-data">

<div id="container">
<h2>Surrender Pet Form</h2>
<h3>Add New Pet</h3>
	<div class="section">
		<div class="label">
			Pet Name
		</div>
		<div class="field">
			<input type="text" name="pet_name" required="required">
		</div>
	</div>
	<div class="section" style="padding-top:15px;">
		<div class="label">
			Pet Category
		</div>
		<div class="field">
		<select name="pet_category" required="required">
			<option value="">---Please select---</option>
			<option value="Cat">Cat</option>
			<option value="Dog">Dog</option>
			<option value="Hamster">Hamster</option>
			<option value="Rabbit">Rabbit</option>
			<option value="Other">Other</option>
			</select>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Age
		</div>
		<div class="field">
			<input type="text" name="pet_age" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Gender
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="radio" name="gender" value="Male" required="required"> &nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="gender" value="Female" required="required"> &nbsp;&nbsp;Female 
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Vaccine
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="radio" name="vaccine" value="Yes" required="required"> &nbsp;&nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="vaccine" value="No" required="required"> &nbsp;&nbsp;No 
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Spayed
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="radio" name="spayed" value="Yes" required="required"> &nbsp;&nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="spayed" value="No" required="required"> &nbsp;&nbsp;No 
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Breed
		</div>
		<div class="field">
		<input type="text" name="pet_breed" required>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Condition
		</div>
		<div class="field">
		<input type="text" name="pet_condition" required>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Color
		</div>
		<div class="field">
		<input type="text" name="pet_color" required>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Pet Adoption Fee
		</div>
		<div class="field">
		<input type="text" name="pet_fee" required>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Upload Pet Image
		</div>
		<div class="field">
		<input type="file" name="pet_pic" required>
		</div>
	</div>
	<div class="section">
		<div class="label">
			&nbsp;
		</div>
		<div class="field">
			<button type="submit" class="btn" name="submitBtn">Submit</button>
			<button type="reset" class="btn">Reset</button>
		</div>
	</div>
</div>
</form>
<?php include('footer.html'); ?>
</body>
</html>
