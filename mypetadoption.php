<?php
    include("session.php");
    include("conn.php");
?>

<html>
<head>
    <title>My Pet Adoption</title>
	<link href="styles/chlstyle.css" rel="stylesheet">
    <link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>
<?php include('checking_header2.php'); ?>
<br>
<div class="parentbox">
    <div style="width:100%; float: left; background-color: #f1af54; padding:10 10 10 10;">
        <strong>Kindly come to the physical store to pick up your pet after the approval within 7 working days.</strong>
	</div>
</div>

<table id="contacts">
    <tr>
        <th>Pet_id</th>
        <th>Adopt for Who</th>
        <th>Responsible person</th>
        <th>Pet Experience</th>
        <th>Surrender Pet Experience</th>
        <th>Surrender Pet Reason</th>
        <th>Date Request</th>
        <th>Approval status</th>
    </tr>

    <?php 
        $result = mysqli_query($con, "SELECT * FROM pet_approval WHERE Name = \"".$_SESSION['mySession']."\";");
        $result2 = mysqli_query($con, "SELECT * FROM pet_approval WHERE Name = \"".$_SESSION['mySession']."\";");
        
        $test = mysqli_fetch_array($result2);
        if(!empty($test)){
            while ($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>";
            echo $row['pet_id'];
            echo "</td>";
            echo "<td>";		
            echo $row['for_who'];
            echo "</td>";
            echo "<td>";
            echo $row['who_responsible'];
            echo "<td>";
            echo $row['pet_experience'];
            echo "</td>";
            echo "<td>";
            echo $row['surrender_pet'];
            echo "</td>";
            echo "<td>";
            echo $row['surrender_reason'];
            echo "</td>";
            echo "<td>";
            echo $row['date_added'];
            echo "</td>";
            echo "<td>";
            echo $row['approval_status'];
            echo "</td></tr>";
            }
        } else{
            echo "<h2 style='color: red;'>You have not requested for pet adoption.</h2>";
        }

        mysqli_close($con);
    ?>
</table>
<?php include('footer.html'); ?>
</body>
</html>