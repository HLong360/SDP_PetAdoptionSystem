<?php
    include('session.php');
?>
<html>
    <head>
        <title>My Profile</title>
        <link href="styles/HF1_style.css" rel="stylesheet">
        <link href="styles/PROFILE1.CSS" rel="stylesheet">
    </head>
    <body>
    <?php
        include('checking_header2.php');
        include("conn.php");
        $result = mysqli_query($con,"SELECT * FROM staff WHERE username ='".$_SESSION['mySession']."';");
        $row = mysqli_fetch_array($result);
        mysqli_close($con);
    ?>
        <div class="main-content">

                <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; width:100%; background-image: url(image/background-image.jpg); background-size: cover; background-position: center top;">

                <span class="mask bg-gradient-default opacity-8"></span>
                <div class="container-fluid d-flex align-items-center">
                    <div class="row">
                    <div class="col-lg-7 col-md-10">
                        <h1 class="display-2 text-white">Welcome!</h1>
                        <p class="text-white mt-0 mb-5">Welcome to your profile page, you can view your profile information here</p>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Page content -->
                <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                            <h3 class="mb-0">My Profile</h3>
                            </div>
                            <div class="col-4 text-right">
                            <a href="editprofile_staff.php" class="btn btn-sm btn-primary">Edit Profile</a>
                            </div>
                        </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Username</label>
                                        <id="input-name" class="form-control form-control-alternative" value="">
                                        <?php
                                        echo $row['username'];
                                        ?>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Full Name</label>
                                        <id="input-ic-number" class="form-control form-control-alternative" value="">
                                        <?php
                                        echo $row['name'];
                                        ?>                            
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Contact Number</label>
                                        <id="input-Residential-Address" class="form-control form-control-alternative"value="">
                                        <?php
                                        echo $row['phone'];
                                        ?>     
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Gender</label>
                                        <id="input-gender" class="form-control form-control-alternative"value="">
                                        <?php
                                        echo $row['gender'];
                                        ?>      
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                        <label class="form-control-label">Email</label>
                                        <id="input-country" class="form-control form-control-alternative" value="">
                                        <?php
                                        echo $row['email'];
                                        ?>      
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label class="form-control-label">Residential Address</label>
                                        <id="input-city" class="form-control form-control-alternative" value="">
                                        <?php
                                        echo $row['address'];
                                        ?>  
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label">Joined Date</label>
                                        <id="input-name" class="form-control form-control-alternative" value="">
                                        <?php
                                        echo $row['joined_date'];
                                        ?>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Role</label>
                                        <id="input-ic-number" class="form-control form-control-alternative" value="">
                                        <?php
                                        echo $row['role'];
                                        ?>                            
                                    </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <?php
            include("footer.html");
            ?>
    </body>
</html>