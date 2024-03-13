<nav>
    <a href="Home.php"><img src="image/logo.png" class="logo"></a>
    <ul>
        <li><a href="Home.php">Home</a></li>
        <li><a href="Services.php">Services</a></li>
        <li><a>Pets &#8628</a>
            <ul>
                <li><a href="view_pet.php">Pet List</a></li>
                <li><a href="surrender_pet.php">Surrender Pet Form</a></li>
                <li><a href="pet_approval.php">Pet Adoption Approval</a></li>
                <?php if($_SESSION['level'] == 'Manager'){
                    echo "<li><a href='adopted_pet.php'>Adopted Pet List</a></li>";
                } ?>
            </ul>
        </li>
        <?php
            if($_SESSION['level'] == "Manager"){
                echo "<li><a href='event.php'>Event</a></li>";
                echo "<li><a>Report &#8628</a>";
                echo "<ul><li><a href='pet_report.php'>Pet Report</a></li></ul></li>";
            }
        ?>
        <li><a>Feedback &#8628</a>
            <ul>
                <li><a href="view_fb_member.php">View Customer's Feedback</a></li>
                <li><a href="feedback_staff.php">Give Feedback</a></li>
                <li><a href="myfeedback_staff.php">My Feedback</a></li>
            </ul>
        </li>
        <li><a href="myprofile_staff.php">Profile</a></li>
        <li><a href="signout.php">Log Out</a></li>
    </ul>
</nav>
<br>