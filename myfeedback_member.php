<?php
    include("session.php");
    include("conn.php");

?>
<html>
<head>
    <title>My feedback</title>
	<link href="styles/chlstyle.css" rel="stylesheet">
    <link href="styles/HF1_style.css" rel="stylesheet">
</head>

<body>
<?php include('checking_header2.php'); ?>
<br>
<table id="contacts">
    <tr>
        <th>Category</th>
        <th>Comment</th>
        <th>Date</th>
        <th>Action</th>
    </tr>

    <?php 
        $result = mysqli_query($con, "SELECT * FROM feedback_member WHERE Name = \"".$_SESSION['mySession']."\";");
        $result2 = mysqli_query($con, "SELECT * FROM feedback_member WHERE Name = \"".$_SESSION['mySession']."\";");
        
        $test = mysqli_fetch_array($result2);
        if(!empty($test)){
            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>";
                echo $row['category'];
                echo "</td>";
                echo "<td>";
                echo $row['comment'];
                echo "</td>";
                echo "<td>";		
                echo $row['date'];
                echo "</td>";
                echo "<td>";
                echo "<a href='myreply_member.php'>View Reply</a>";
                echo "</td></tr>";
            }
        } else{
            echo "<h2 style='color: red;'>You have not given any feedback yet.</h2>";
        }
        
        mysqli_close($con);
    ?>
</table>
<?php include("footer.html"); ?>
</body>
</html>