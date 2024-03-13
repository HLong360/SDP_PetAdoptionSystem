<?php
    include('session.php');
    if($_SESSION["level"] == "Manager" || $_SESSION["level"] == "Employee"){
        include("conn.php");
        $id = intval($_GET['Aid']); 

        $approve_sql = "UPDATE pet_approval SET
        approval_status = 'Approve'
        WHERE Aid = $id;
        ";

        if(!mysqli_query($con, $approve_sql)){
            echo "<script>alert('Failed to update!');window.location.href='pet_approval.php';<script>";
        }

        $query_pet = mysqli_query($con,"SELECT * FROM pet_approval WHERE Aid = $id;");
        $arr_pet = mysqli_fetch_array($query_pet);
        $pet_id = $arr_pet["pet_id"];
        $user_name = $arr_pet["Name"];

        $query_user_id = mysqli_query($con,"SELECT Id FROM customers WHERE Username = '".$user_name."';");
        $arr_user_id = mysqli_fetch_array($query_user_id);
        $user_id = $arr_user_id["Id"];

        $adopt_sql = "INSERT INTO adopted_pet (Id, pet_id) 
        VALUES ($user_id, $pet_id);";
        if(mysqli_query($con, $adopt_sql)){
            if(mysqli_query($con, "UPDATE pets SET adopt_status = 'Yes' WHERE pet_id = $pet_id;")){
                mysqli_close($con);
                echo "<script>alert('Pet adoption have been approve!'); window.location.href='pet_approval.php';</script>";
            }
        }else{
            die("Error:".mysqli_connect_error());
        }
    }else{
        echo "<script>alert('Please login as a staff!'); window.location.href='login.php';</script>";
    }
        
    
    
?>