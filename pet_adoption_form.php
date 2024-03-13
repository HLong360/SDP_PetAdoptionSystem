<?php
	include('session.php');
    
    include("conn.php");
	$id = intval($_GET['pet_id']); 
    if (isset($_POST['submitBtn'])) {

        $sql="INSERT INTO pet_approval (pet_id, Name, for_who, who_responsible, pet_experience, surrender_pet, surrender_reason, date_added, approval_status) 
        VALUES ('$id','$_SESSION[mySession]','$_POST[for_who]','$_POST[who_responsible]','$_POST[pet_exp]','$_POST[surrender_pet]','$_POST[surrender_reason]',NOW(),'Pending')";    

        if (!mysqli_query($con,$sql)){
            die('Error: ' . mysqli_error($con));
        }
        else {
            echo '<script>alert("The pet adoption is now pending for approval!");
            window.location.href= "Home.php";
            </script>';
        }
    }
    
        mysqli_close($con);
?>

<html>
<head>
    <title>Pet Adoption Form</title>
	<link href="styles/chlstyle.css" rel="stylesheet">
	<link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>
<?php include('checking_header2.php'); ?>
<form action="#" method="post">

<div id="container">
<h2>Pet Adoption Form</h2>
<h3>Please Answer the Questions Below</h3>
	<div class="section">
		<div class="label">
			1. Who are you adopting this pet for?
		</div>
		<div class="field">
			<input type="text" name="for_who" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			2. Who will have the primary responsibility of this pet?
		</div>
		<div class="field">
			<input type="text" name="who_responsible" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			3. Have you had pets before?
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="radio" name="pet_exp" value="Yes" required="required"> &nbsp;&nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="pet_exp" value="No" required="required"> &nbsp;&nbsp;No 
		</div>
	</div>
	<div class="section">
		<div class="label">
			4. Have you surrendered or given away a pet?
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="radio" name="surrender_pet" value="Yes" required="required"> &nbsp;&nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="surrender_pet" value="No" required="required"> &nbsp;&nbsp;No 
		</div>
	</div>
	<div class="section">
		<div class="label">
			5. If you answered 'Yes' in Question 4, please provide the reasons:
		</div>
		<div class="field">
		<textarea name="surrender_reason"></textarea>
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