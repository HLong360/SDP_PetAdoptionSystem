<?php
    if(isset($_SESSION["level"])){
        if($_SESSION["level"] == "cust"){
            include('header_cust.html');
        } elseif($_SESSION["level"] == "Manager" || $_SESSION["level"] == "Employee"){
            include('header_staff.php');
        } elseif($_SESSION["level"] == "Admin"){
            include('header_admin.html');
        }
    } else{
        include('header_general.html');
    }
?>