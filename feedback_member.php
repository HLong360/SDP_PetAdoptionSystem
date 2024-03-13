<?php
    include('session.php');
    if(isset($_POST['SubmitBtn'])){
        include('conn.php');

        $sql = "INSERT INTO feedback_member (name,category,comment,date)
        VALUES ('$_SESSION[mySession]','$_POST[fb_type]','$_POST[comment]',NOW());
        ";

        if (!mysqli_query($con,$sql)){
            die('Error: ' . mysqli_error($con));
        }
        else {
            echo '<script>alert("Your feedback has saved!");
            window.location.href= "Home.php";
            </script>';
        }

        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Feedback</title>
        <link href="styles/chlstyle.css" rel="stylesheet">
        <link href="styles/HF1_style.css" rel="stylesheet">
        <script>
            function cancel_confirm() {
                if (confirm("Are you sure?") == true) {
                    window.open("Home.php", "_self") 
                }
            }
        </script>
    </head>

    <body>
        <?php include('checking_header2.php'); ?>
        <div id="container">
            <h1>Feedback</h1>

            <h3>We would like to hear feedback from you!</h3>

            <form method="post" action="#">
                <div class="section">
                    <div class="label">
                        Please select your feedback category:
                    </div>

                    <div class="field">
                        <select name="fb_type" required>
                            <option value="Suggestion">Suggestion</option>
                            <option value="Complaint">Complaint</option>
                            <option value="Error">Website Error</option>
                        </select>
                    </div>
                </div>
                
                <div class="section">
                    Please leave your feedback below: <br>
                    <textarea name='comment' required></textarea>
                </div>

                <div class="section">
                    <button type="submit" class="btn" name="SubmitBtn">Submit</button>
                    <button type="button" class="btn" onclick="cancel_confirm()">Cancel</button>
                </div>
            </form>
        </div>
        <?php include("footer.html"); ?>
    </body>
</html>