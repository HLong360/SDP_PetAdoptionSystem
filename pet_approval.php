<?php
    include('session.php');
    include("conn.php");
?>
<html>
<head>
    <title>Pet Approval</title>
	<link href="styles/chlstyle.css" rel="stylesheet">
    <link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>
<?php include('checking_header2.php'); ?>
<table id="contacts">
    <tr>
        <th>Pet_id</th>
        <th>Username</th>
        <th>Adopt for Who</th>
        <th>Responsible person</th>
        <th>Pet Experience</th>
        <th>Surrender Pet Experience</th>
        <th>Surrender Pet Reason</th>
        <th>Date Request</th>
        <th>Action</th>
    </tr>

    <?php 
        $result = mysqli_query($con, "SELECT * FROM pet_approval WHERE approval_status = 'Pending';");
        $result2 = mysqli_query($con, "SELECT * FROM pet_approval WHERE approval_status = 'Pending';");
        
        $test = mysqli_fetch_array($result2);
        if(!empty($test)){
            while ($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>";
            echo $row['pet_id'];
            echo "</td>";
            echo "<td>";
            echo $row['Name'];
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
            echo "<a class='edit' href=\"approve_pet.php?Aid=".$row['Aid'];
            echo "\">Approve</a> &nbsp;";
            echo "<a class='delete' href=\"reject_pet.php?Aid=".$row['Aid'];
            echo "\">Reject</a>";
            echo "</td></tr>";
            }
        } else{
            echo "<h2 style='color: red;'>No pet adoption in pending</h2>";
        }

        mysqli_close($con);
    ?>
</table>
<?php include('footer.html'); ?>
</body>
</html>