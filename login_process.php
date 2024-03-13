<?php
    session_start();
    include("conn.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = mysqli_real_escape_string($con, $_POST["user_name"]);
        $pw = mysqli_real_escape_string($con, $_POST["pass_word"]);
        
        if($uname == "ADMINISTRATOR" && $pw == "admin123"){
            $_SESSION['mySession'] = "ADMIN";
            $_SESSION['level'] = "Admin";
            header("location: home.php");
        }

        $sql_staff = "SELECT * FROM staff_login WHERE username = '$uname' AND password = '$pw';";
        $sql_member = "SELECT * FROM customer_login WHERE Username = '$uname' AND password = '$pw';";

        $result_staff = mysqli_query($con, $sql_staff);
        $result_member = mysqli_query($con, $sql_member);
        if(mysqli_num_rows($result_staff) == 1) {
            $detail = mysqli_query($con, "SELECT * FROM staff WHERE username = '$uname';");
            $row = mysqli_fetch_array($detail);

            $_SESSION["mySession"] = $row['username'];
            $_SESSION["level"] = $row['role'];
            header("location: home.php");
    
        } elseif(mysqli_num_rows($result_member) == 1) {
            $detail = mysqli_query($con, "SELECT Username FROM customers WHERE Username = '$uname';");
            $row = mysqli_fetch_array($detail);

            $_SESSION['mySession'] = $row['Username'];
            $_SESSION['level'] = "cust";
            header("location: home.php");
                   
        } else {
            die("<script>alert('Your Username or Password is invalid. Please try again.');
            window.location.href='login.php';</script>");
        }
        mysqli_close($con);
    }
?>