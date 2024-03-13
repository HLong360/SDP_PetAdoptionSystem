<?php
	include("session.php");
	if(isset($_POST["DoneBtn"])){
		include("conn.php");

		$sql = "INSERT INTO reply_member (r_Name,reply,r_date,fbm_id)
				VALUES ('$_SESSION[mySession]','$_POST[reply_message]',NOW(),'$_POST[fbm_id]');
				";

		if (mysqli_query($con, $sql)) {
			mysqli_close($con);
			if($_SESSION['level'] == "Admin"){
				echo "<script>alert('Your reply has added!'); window.location.href='view_fb_staff.php';</script>";
			} else{
				echo "<script>alert('Your reply has added!'); window.location.href='view_fb_member.php';</script>";
			}		
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
<title>Reply Feedback</title>
<link href="styles/chlstyle.css" rel="stylesheet">
<link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>
<?php
	include('checking_header2.php');
	include("conn.php");
	$id = intval($_GET['fbm_id']); 
	$result = mysqli_query($con,"SELECT * FROM feedback_member WHERE fbm_id=$id");
	$row = mysqli_fetch_array($result)
?>

<form method="post" >
<input type="hidden" name="fbm_id" value="<?php echo $row['fbm_id'] ?>">
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
	include('footer.html');
	mysqli_close($con);
?>
</body>
</html>
