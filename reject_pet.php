<?php
    include('session.php');
    if($_SESSION["level"] == "Manager" || $_SESSION["level"] == "Employee"){
        include("conn.php");
        $id = intval($_GET['Aid']); 

        $reject_sql = "UPDATE pet_approval SET
        approval_status = 'Reject'
        WHERE Aid = $id;
        ";

        if(mysqli_query($con, $reject_sql)){
            mysqli_close($con);
            echo "<script>alert('Pet adoption have been reject!'); window.location.href='pet_approval.php';</script>";
        } else{
            echo "<script>alert('Failed to update!');<script>";
            mysqli_close($con);
        }
    }else{
        echo "<script>alert('Please login as a staff!'); window.location.href='login.php';</script>";
    }
    

?>