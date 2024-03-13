<?php
    include("session.php");
    include("conn.php");

    if(isset($_POST['joinBtn'])){
        $id = intval($_POST['event_id']);
        $result_num = mysqli_query($con, "SELECT joined_no FROM event WHERE event_id = $id;");
        $num = mysqli_fetch_array($result_num);
        $new_num = intval($num['joined_no']) + 1;

        $sql = "UPDATE event SET joined_no = $new_num WHERE event_id = $id;";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('You have joined the event sucessfully!'); window.location.href='event.php';</script>";
        } else{
            die("Error".mysqli_error($con));
        }
    }
?>
<html>
<head>
    <title>Event</title>
    <link href="styles/event.css" rel="stylesheet">
    <link href="styles/HF1_style.css" rel="stylesheet">
</head>
<body>
    <?php 
        include('checking_header2.php');
        if($_SESSION['level'] == 'Manager'){
            $createBtn = '<div style="width:98%; float: left">
            <button class="button" style="margin-bottom:10px; float: right" onclick="window.location.href=\'create_event.php\'">Create Event</button> 
            </div>
            ';
            echo $createBtn;
        }
        
        $result = mysqli_query($con, "SELECT * FROM event ORDER BY event_date DESC");

        while($row = mysqli_fetch_array($result)){
            if($_SESSION['level'] == "Manager"){
                $poster = $row['event_pic'];

                $data = '<div class="box">
                <img src="eventImg/'.$poster.'" class="box-image">
                <h2>'.$row['event_name'].'</h2>
                <br>
                <ul>
                    <li>Venue:'.$row['event_venue'].'</li>
                    <li>Date:'.$row['event_date'].'</li>
                    <li>Time:'.$row['event_time'].'</li>
                </ul>
                <br>
                <p>'.$row['event_desc'].'</p>
                <br><br>
                <h3 style="color:yellow;">Number of participants: '.$row['joined_no'].'</h3>
                </div>
                ';

                echo $data;
            } elseif($_SESSION['level'] == "cust"){
                $poster = $row['event_pic'];

                $data = '<div class="box">
                <img src="eventImg/'.$poster.'" class="box-image">
                <h2>'.$row['event_name'].'</h2>
                <br>
                <ul>
                    <li>Venue:'.$row['event_venue'].'</li>
                    <li>Date:'.$row['event_date'].'</li>
                    <li>Time:'.$row['event_time'].'</li>
                </ul>
                <br>
                <p>'.$row['event_desc'].'</p>
                <br><br>
                <form method="post" action="#">
                    <input type="hidden" name="event_id" value="'.$row['event_id'].'">
                    <button class="button1" name="joinBtn">I want to join!</button>
                </form>
                </div>
                ';

                echo $data;
            }
            
        }
    ?>

    <?php 
        include('footer.html'); 
        mysqli_close($con);
    ?>
</body>
</html>