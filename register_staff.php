<?php
	include("session.php");
    include('conn.php');
    
    if(isset($_POST['submitBtn'])){
        $check_username = mysqli_query($con, "SELECT username FROM staff WHERE username = \"".$_POST['username']."\"");
        if(mysqli_num_rows($check_username) > 0){
            die("<script>alert('Username repeated! Please enter other username.');
			window.location.href='register_staff.php';</script>");
        }
		if(empty($_POST['role'])){
			die("<script>alert('Please select a user role from the list before the submission!');
			window.location.href='register_staff.php';</script>");
		}
		if(strlen($_POST['ic_num']) != 12 or !is_numeric($_POST['ic_num'])){
			die("<script>alert('Please enter valid I/C Number format');
			window.location.href='register_staff.php';</script>");
		}

        $passw = $_POST['pwd'];
        $cpassw = $_POST['con_pwd'];
        if($passw != $cpassw){
            die("<script>alert('Password not matched! Please try again.');
			window.location.href='register_staff.php';</script>");
        } else{
            $sql_details = "INSERT INTO staff(ic,username, name, gender, phone, email, address,joined_date,role)
            VALUES ('$_POST[ic_num]','$_POST[username]','$_POST[full_name]','$_POST[gender]','$_POST[phone_no]','$_POST[email_addr]','$_POST[address]','$_POST[joined_date]','$_POST[role]');";

            if (mysqli_query($con,$sql_details)){
                $sql_logindetails = "INSERT INTO staff_login(ic,username, password) VALUES ('$_POST[ic_num]','$_POST[username]', '$_POST[pwd]');";
				if(mysqli_query($con, $sql_logindetails)){
                    echo "<script>alert('Registered successfully!');
                    window.location.href='Home.php';</script>";
                } else{
					die("<script>alert('Register failed. Please try again.');</script>");
                }
            } else {
                die("<script>alert('Register failed. Please try again.');</script>");
            }
        }
    }
    
?>

<!DOCTYPE html>
<html>
<head>
<title>Staff Registration</title>
<link href="styles/chlstyle.css" rel="stylesheet" type="text/css">
<link href="styles/HF1_style.css" rel="stylesheet">
<script>
    function checkpw(){
        var pw = document.getElementById("pwd").value;
        var conPw = document.getElementById("con_pwd").value;
        
        if(pw != conPw) {
            var message = "Password is not match!";
            document.getElementById('pwMessage').innerHTML = message;
        } else {
            document.getElementById('pwMessage').innerHTML = " ";
        }
    }
</script>
</head>

<body>
<?php include('checking_header2.php'); ?>
<form method="post" action="#">

<div id="container">
<h2>Pet Adoption System</h2>
<h3>Staff Registration</h3>
    <div class="section">
		<div class="label">
			User Role
		</div>
		<div class="field">
			<select name="role" required="required">
                <option value="">---Please select---</option>
                <option value="Employee">Employee</option>
                <option value="Manager">Store Manager</option>
            </select>
		</div>
	</div>
    <div class="section">
		<div class="label">
			Username
		</div>
		<div class="field">
			<input type="text" name="username" required="required">
		</div>
	</div>
    <div class="section">
		<div class="label">
			Full Name
		</div>
		<div class="field">
			<input type="text" name="full_name" required="required">
		</div>
	</div>
    <div class="section">
		<div class="label">
			I/C Number (Example: 111111223333)
		</div>
		<div class="field">
			<input type="text" name="ic_num" required="required">
		</div>
	</div>
    <div class="section">
		<div class="label">
			Gender
		</div>
		<div class="field" style="padding-top:10px;">
			<input type="radio" name="gender" value="Male" required="required"> &nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="gender" value="Female" required="required"> &nbsp;&nbsp;Female 
		</div>
	</div>
    <div class="section">
		<div class="label">
			Contact Number (Example: 012-3456789)
		</div>
		<div class="field">
			<input type="text" name="phone_no" required="required">
		</div>
	</div>
    <div class="section">
		<div class="label">
			Email Address
		</div>
		<div class="field">
			<input type="email" name="email_addr" required="required">
		</div>
	</div>
    <div class="section">
		<div class="label">
			Residential Address
		</div>
		<div class="field">
			<textarea name="address" required="required"></textarea>
		</div>
	</div>
    <div class="section">
		<div class="label">
			Joined Date
		</div>
		<div class="field">
			<input type="date" name="joined_date" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Password
		</div>
		<div class="field">
			<input type="password" name="pwd" id="pwd" required="required">
		</div>
	</div>
	<div class="section">
		<div class="label">
			Confirm Password
		</div>
		<div class="field">
			<input type="password" name="con_pwd" id="con_pwd" required="required" onkeyup="checkpw()">
            <strong><p id="pwMessage" style="color:red;"></p></strong>
		</div>
	</div>
	
	<div class="section">
		<div class="label">
			&nbsp;
		</div>
		<div class="field">
			<button type="submit" class="btn" name="submitBtn">Register</button>
			<button type="reset" class="btn">Reset</button>
		</div>
	</div>
	

</div>
</form>
<?php include('footer.html'); ?>
</body>
</html>