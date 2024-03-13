<?php
    include('session.php');
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
        $result = mysqli_query($con, "SELECT * FROM feedback_member WHERE NOT category='Error'");
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
            echo "<td><a href=\"reply_fb_member.php?fbm_id=";
            echo $row['fbm_id'];
            echo "\">Reply</a></td></tr>";
        }
        mysqli_close($con);
    ?>
</table>
<?php include('footer.html'); ?>
</body>
</html>