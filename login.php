<?php
  session_start();
  if(isset($_SESSION['mySession'])){
    echo "<script>alert('You have logged in!');
          window.location.href='home.php';</script>";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/login_style.css" />
    <link href="styles/HF1_style.css" rel="stylesheet">
    <title>Login</title>
  </head>
  <body>
    <?php include("checking_header2.php"); ?>
    <section class="container">
        <div class="login-container">
            
            <div class="form-container">

                <h1 class="opacity">Pet Adoption System</h1>
                
                <h1 class="opacity">Login</h1>
                
                <form method="post" action="login_process.php">
                    <input type="text" placeholder="USERNAME" required name="user_name">
                    <input type="password" placeholder="PASSWORD" required name="pass_word">
                    <button class="opacity" type="submit" name="submitBtn">LOGIN</button>
                </form>
                <div class="register-forget opacity">
                    <a style="color: red;" href="register_member.php">Not a member?Sign Up HERE!</a>
                </div>                  
            </div>            
        </div>
        <div class="theme-btn-container"></div>
    </section>
    <?php include("footer.html"); ?>
  </body>
</html>