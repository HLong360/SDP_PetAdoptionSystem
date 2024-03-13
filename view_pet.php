<html>
<head>
    <title>Pet List</title>
	<link href="styles/HF1_style.css" rel="stylesheet">
	<link href="styles/chlstyle.css" rel="stylesheet">
</head>

<body>
	<?php include('checking_header.php'); ?>
	<!-- search field and button -->
	<div class="parentbox">
		<div style="width:50%; float: left">
			<form method="post">
				Search 
				<input type="text" style="width: 250px; padding: 8px; margin: 3px 0 11px 0; display: inline-block; font-size:12pt;" name="search_key"> 
				<button class="button" name="searchBtn" type="submit">Submit</button>
			</form>
		</div>
		
		<!-- surrender pet button -->
		<?php
			if(isset($_SESSION['level'])){
				if($_SESSION['level'] == "Manager"||$_SESSION['level'] == "Employee"){
					$surrenderBTN = '
					<div style="width:50%; float: left">
					<button class="button" style="margin-bottom:10px; float: right" onclick="window.location.href=\'surrender_pet.php\'">Surrender Pet</button> 
					</div>
					';
					echo $surrenderBTN;
				}
			}
			
		?>

		<!-- category filter button -->
		<div style="width:100%; float: left; background-color: #f1af54;">
			<strong>Browse by pet category:</strong>
			<form method="post">
				<button class="button" name="AllBtn">All</button>
				<button class="button" name="CatBtn">Cat</button>
				<button class="button" name="DogBtn">Dog</button>
				<button class="button" name="HamsterBtn">Hamster</button>
				<button class="button" name="RabbitBtn">Rabbit</button>
				<button class="button" name="OtherBtn">Other</button>
			</form>
		</div>
	</div>
	
	<?php
	include("conn.php");
			//search function
	$search_key = "";

	if(isset($_POST['searchBtn'])){
		$search_key = $_POST['search_key'];
		$result=mysqli_query($con,"SELECT * FROM pets WHERE pet_category LIKE '%$search_key%' OR pet_name LIKE '%$search_key%' AND adopt_status = 'No' ORDER BY pet_name");
	} else{
		$result=mysqli_query($con,"SELECT * FROM pets WHERE NOT adopt_status = 'Yes' ORDER BY pet_name");
	}

	//category function
	if(isset($_POST['CatBtn'])){
		$result=mysqli_query($con,"SELECT * FROM pets WHERE pet_category = 'Cat' AND NOT adopt_status = 'Yes' ORDER BY pet_name");
	} else if(isset($_POST['DogBtn'])){
		$result=mysqli_query($con,"SELECT * FROM pets WHERE pet_category = 'Dog' AND NOT adopt_status = 'Yes' ORDER BY pet_name");
	} else if(isset($_POST['HamsterBtn'])){
		$result=mysqli_query($con,"SELECT * FROM pets WHERE pet_category = 'Hamster' AND NOT adopt_status = 'Yes' ORDER BY pet_name");
	} else if(isset($_POST['RabbitBtn'])){
		$result=mysqli_query($con,"SELECT * FROM pets WHERE pet_category = 'Rabbit' AND NOT adopt_status = 'Yes' ORDER BY pet_name");
	} else if(isset($_POST['OtherBtn'])){
		$result=mysqli_query($con,"SELECT * FROM pets WHERE pet_category = 'Other' AND NOT adopt_status = 'Yes' ORDER BY pet_name");
	} else if(isset($_POST['AllBtn'])){
		$result=mysqli_query($con,"SELECT * FROM pets WHERE NOT adopt_status = 'Yes' ORDER BY pet_name");
	}
	?>
	
	<!-- light blue pet list -->
	<div class="parentbox" style="background-color: #fadca4;">
	<?php
		while($row=mysqli_fetch_array($result)){
			if(isset($_SESSION["level"])){
				if($_SESSION["level"] == "Manager" || $_SESSION["level"] == "Employee"){
					$data = '<div class="childbox">
				
					<img src="petsImg/'.$row['pet_pic'].'" width="200" height="200" style="margin-left: auto; margin-right: auto; border-radius:50%;">
					
					<h3>'.$row['pet_name'].'</h3>
					Age:<br>'.$row['pet_age'].'<br><br>
					Category:<br>'.$row['pet_category'].'<br><br>
					Breed:<br>'.$row['pet_breed'].'<br><br>
					Gender:<br>'.$row['pet_gender'].'<br><br>
					Vaccine:<br>'.$row['pet_vaccine'].'<br><br>
					Spayed:<br>'.$row['pet_spayed'].'<br><br>
					Condition:<br>'.$row['pet_condition'].'<br><br>
					Color:<br>'.$row['pet_color'].'<br><br>
					Date added:<br>'.$row['pet_date'].'<br><br>
					Adoption fee:<br>'.$row['pet_fee'].'<br><br>
					
					<a class="edit" href="edit_pet.php?pet_id='.$row['pet_id'].'">Edit</a> 
					<a class="delete" onclick="return confirm(\'Delete '.$row['pet_name'].' record?\');" href="delete_pet.php?pet_id='.$row['pet_id'].'">Delete</a> 
	
					</div>
					';
					echo $data;
				} elseif($_SESSION["level"] == "cust") {
					$data = '<div class="childbox">
				
					<img src="petsImg/'.$row['pet_pic'].'" width="200" height="200" style="margin-left: auto; margin-right: auto; border-radius:50%;">
					
					<h3>'.$row['pet_name'].'</h3>
					Age:<br>'.$row['pet_age'].'<br><br>
					Category:<br>'.$row['pet_category'].'<br><br>
					Breed:<br>'.$row['pet_breed'].'<br><br>
					Gender:<br>'.$row['pet_gender'].'<br><br>
					Vaccine:<br>'.$row['pet_vaccine'].'<br><br>
					Spayed:<br>'.$row['pet_spayed'].'<br><br>
					Condition:<br>'.$row['pet_condition'].'<br><br>
					Color:<br>'.$row['pet_color'].'<br><br>
					Date added:<br>'.$row['pet_date'].'<br><br>
					Adoption fee:<br>'.$row['pet_fee'].'<br><br>
	
					<a class="edit" href="pet_adoption_form.php?pet_id='.$row['pet_id'].'">I want to adopt this pet</a>
					</div>
					';
					echo $data;
				}
			} else{
					$data = '<div class="childbox">
				
					<img src="petsImg/'.$row['pet_pic'].'" width="200" height="200" style="margin-left: auto; margin-right: auto; border-radius:50%;">
					
					<h3>'.$row['pet_name'].'</h3>
					Age:<br>'.$row['pet_age'].'<br><br>
					Category:<br>'.$row['pet_category'].'<br><br>
					Breed:<br>'.$row['pet_breed'].'<br><br>
					Gender:<br>'.$row['pet_gender'].'<br><br>
					Vaccine:<br>'.$row['pet_vaccine'].'<br><br>
					Spayed:<br>'.$row['pet_spayed'].'<br><br>
					Condition:<br>'.$row['pet_condition'].'<br><br>
					Color:<br>'.$row['pet_color'].'<br><br>
					Date added:<br>'.$row['pet_date'].'<br><br>
					Adoption fee:<br>'.$row['pet_fee'].'<br><br>

					</div>
					';
					echo $data;
			}
			
		} 
		mysqli_close($con);
	?>
	</div>
	
	<?php include("footer.html");?>
</body>
</html>