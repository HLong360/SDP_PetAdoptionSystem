<?php
	include("session.php");
	if(isset($_POST["DoneBtn"])){
		include("conn.php");

		if($_SESSION['level'] == "Admin"){
			$sql = "INSERT INTO reply_staff (r_Name,reply,r_date,fbs_id)
			VALUES ('$_SESSION[mySession]','$_POST[reply_message]',NOW(),$_POST[fbs_id]);
			";

			if (mysqli_query($con, $sql)) {
				mysqli_close($con);
				echo "<script>alert('Your reply has added!'); window.location.href='view_fb_staff.php';</script>";
			} else{
				die("Error: ". mysqli_error($con));
			}
		}else{
			die("<script>alert('Please login as admin!'); window.location.href='login.php';</script>");
		}

	}

?>
<!DOCTYPE html>
<html>
<head>
<title>Reply feedback</title>
<link href="styles/chlstyle.css" rel="stylesheet">
<link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>

<?php
	include('checking_header2.php');
	include("conn.php");
	$id = intval($_GET['fbs_id']); 
	$result = mysqli_query($con,"SELECT * FROM feedback_staff WHERE fbs_id=$id");
	$row = mysqli_fetch_array($result)
?>

<form method="post" >
<input type="hidden" name="fbs_id" value="<?php echo $row['fbs_id'] ?>">
<div id="container">
<h2>Reply Feedback</h2>

	<div class="section">
		<div class="label">
			Username
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["Name"] ?>" name="Name" disabled>
		</div>
	</div>
	<div class="section" style="padding-top:15px;">
		<div class="label">
			Feedback Category
		</div>
		<div class="field">
			<input type="text" value="<?php echo $row["category"] ?>" name="category" disabled>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Comment
		</div>
		<div class="field">
			<textarea name="comment" placeholder="<?php echo $row["comment"] ?>" disabled></textarea>
		</div>
	</div>
	<div class="section">
		<div class="label">
			Reply Message
		</div>
		<div class="field">
			<textarea name="reply_message" required></textarea>
		</div>
	</div>
	<div class="section">
		<div class="label">
			&nbsp;
		</div>
		<div class="field">
			<button type="submit" class="btn" name="DoneBtn">Done</button>
		</div>
	</div>
</div>
</form>
<?php
	mysqli_close($con);
	include('footer.html');
?>
</body>
</html>
