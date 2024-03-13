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

<table id="contacts">
    <tr>
        <th>Category</th>
        <th>Comment</th>
        <th>Date</th>
        <th>Reply</th>
        <th>Reply by</th>
        <th>Reply Date</th>
    </tr>

    <?php 
        $result = mysqli_query($con, "SELECT category,comment,date,reply,r_name,r_date FROM feedback_member fm INNER JOIN reply_member rm ON fm.fbm_id = rm.fbm_id
        WHERE fm.Name = \"".$_SESSION['mySession']."\";");

        $result2 = mysqli_query($con, "SELECT category,comment,date,reply,r_name,r_date FROM feedback_member fm INNER JOIN reply_member rm ON fm.fbm_id = rm.fbm_id
        WHERE fm.Name = \"".$_SESSION['mySession']."\";");

        $test = mysqli_fetch_array($result2);
        if(empty($test)){
            echo "<h2 style='color: red;'>There are no reply.</h2>";
        } else{
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
                echo $row['reply'];
                echo "</td>";
                echo "<td>";
                echo $row['r_name'];
                echo "</td>";
                echo "<td>";
                echo $row['r_date'];
                echo "</td></tr>";
            }
        }
        
        mysqli_close($con);
    ?>
</table>
<?php include("footer.html"); ?>
</body>
</html>