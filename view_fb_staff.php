<?php
    include("session.php");
    include("conn.php");
?>
<html>
<head>
    <title>View feedback</title>
	<link href="styles/chlstyle.css" rel="stylesheet">
    <link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>
<?php include('checking_header2.php'); ?>

<table id="contacts">
    <tr>
        <th>Username</th>
        <th>Category</th>
        <th>Comment</th>
        <th>Date</th>
        <th>Reply</th>
    </tr>

    <?php 
        $result = mysqli_query($con, "SELECT * FROM feedback_staff;");
        $result2 = mysqli_query($con, "SELECT * FROM feedback_staff;");
        $resultmember = mysqli_query($con, "SELECT * FROM feedback_member WHERE category = 'Error';");
        $resultmember2 = mysqli_query($con, "SELECT * FROM feedback_member WHERE category = 'Error';");

        $test = mysqli_fetch_array($result2);
        $test2 = mysqli_fetch_array($resultmember2);
        
        if(empty($test) && empty($test2)){
            echo "<h2 style='color: red;'>There are no feedback.</h2>";
        } 
        if(!empty($test)){
            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>";
                echo $row['Name'];
                echo "</td>";
                echo "<td>";
                echo $row['category'];
                echo "</td>";
                echo "<td>";		
                echo $row['comment'];
                echo "</td>";
                echo "<td>";
                echo $row['date'];
                echo "</td>";
                echo "<td><a href=\"reply_fb_staff.php?fbs_id=";
                echo $row['fbs_id'];
                echo "\">Reply</a></td></tr>";
            }
        } 
        if(!empty($test2)){
            while ($row1 = mysqli_fetch_array($resultmember)){
                echo "<tr>";
                echo "<td>";
                echo $row1['Name'];
                echo "</td>";
                echo "<td>";
                echo $row1['category'];
                echo "</td>";
                echo "<td>";		
                echo $row1['comment'];
                echo "</td>";
                echo "<td>";
                echo $row1['date'];
                echo "<td><a href=\"reply_fb_member.php?fbm_id=";
                echo $row1['fbm_id'];
                echo "\">Reply</a></td></tr>";
            }
        }

        mysqli_close($con);
    ?>
</table>
<?php include('footer.html'); ?>
</body>
</html>