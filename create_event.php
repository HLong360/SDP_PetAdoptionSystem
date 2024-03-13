<?php
include("session.php");
 if (isset($_POST['submitBtn'])) {
	include("conn.php");

	if(empty($_FILES['event_pic']['name'])){
		$sql="INSERT INTO event (event_name, event_venue, event_date, event_time, event_desc, event_pic) 
		VALUES ('$_POST[event_name]','$_POST[event_venue]','$_POST[event_date]','$_POST[event_time]','$_POST[event_desc]','default.jpg');";
		

		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		}
		else {
			echo '<script>alert("Event added!");
			window.location.href= "event.php";
			</script>';
		}
	}
	else{
		$target_dir = "eventImg/";
		$target_file = $target_dir . basename($_FILES["event_pic"]["name"]);

		if (move_uploaded_file($_FILES["event_pic"]["tmp_name"], $target_file)) 

		{
			$file_name = basename($_FILES["event_pic"]["name"]);


			$sql="INSERT INTO event (event_name, event_venue, event_date, event_time, event_desc, event_pic) 
			VALUES ('$_POST[event_name]','$_POST[event_venue]','$_POST[event_date]','$_POST[event_time]','$_POST[event_desc]','$file_name');";
			

			if (!mysqli_query($con,$sql)){
				die('Error: ' . mysqli_error($con));
			}
			else {
				echo '<script>alert("Event added!");
				window.location.href= "event.php";
				</script>';
			}
		}
	}
	mysqli_close($con);
 }
?>

<!DOCTYPE html>
<html>
<head>
<title>Create Event</title>
<link href="styles/chlstyle.css" rel="stylesheet">
<link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>
<?php include('checking_header2.php'); ?>
<form action="#" method="post" enctype="multipart/form-data">

<div id="container">
<h2>Create Event</h2>
<h3>Add New Event</h3>
	<div class="section">
		<div class="label">
			Event Name
		</div>
		<div class="field">
			<input type="text" name="event_name" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Event Venue
		</div>
		<div class="field">
			<input type="text" name="event_venue" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Event Date
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="date" name="event_date" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Event Time
		</div>
		<div class="field">
		<input type="text" name="event_time" required>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Event Description
		</div>
		<div class="field">
		<textarea name="event_desc" required></textarea>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Upload Event Poster
		</div>
		<div class="field">
		<input type="file" name="event_pic">
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
