<?php
include("session.php");
	if(isset($_POST["updateBtn"])){
    include("conn.php");
    
    $sql= "UPDATE customers SET 
    Name='$_POST[full_name]',
    Gender='$_POST[gender]',
    Phone='$_POST[phone]',
    Email='$_POST[email]',
    Address='$_POST[address]'
    WHERE Username = '".$_SESSION['mySession']."';";
    if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    echo "<script>alert('Record updated!'); window.location.href='myprofile_member.php';</script>";
    }
    else {echo "<script>alert('Record Failed!'); </script>";}
    }
?>
<head>
  <title>Edit Profile</title>
  <link href="styles/PROFILE1.css" rel="stylesheet" type="text/css">
  <link href="styles/HF1_style.css" rel="stylesheet">
</head>
<body>
  <?php
    include("conn.php");
    $result = mysqli_query($con,"SELECT * FROM customers WHERE Username ='".$_SESSION['mySession']."'");
    $row = mysqli_fetch_array($result);

    include('checking_header2.php');
  ?>

  <div class="main-content">

    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; width:100%; background-image: url(image/background-image.jpg); background-size: cover; background-position: center top;">

      <span class="mask bg-gradient-default opacity-8"></span>

      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Edit Profile</h1>
              <p class="text-white mt-0 mb-5">You can edit your profile informations here.</p>
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
                  <h3 class="mb-0">Edit Profile</h3>
                </div>
                <div class="card-body">
                  <form method="post">
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group focused">
                            <label class="form-control-label">Name</label>
                            <input type="text" id="input-name" class="form-control form-control-alternative" value="<?php echo $row["Name"] ?>" name="full_name">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group focused">
                          <label class="form-control-label">Gender</label> <br>
                          <input type="radio" name="gender"
                          <?php
                          if ($row["Gender"]=="Male"){
                          echo 'checked="checked"';
                          } 
                          ?>			
                          value="Male" required="required"> &nbsp;&nbsp;Male &nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" name="gender"
                          <?php
                          if ($row["Gender"]=="Female"){
                          echo 'checked="checked"';
                          }else{
                            echo "id='".$row['Gender']."'";
                          }
                          ?>	
                          value="Female" required="required"> &nbsp;&nbsp;Female 
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label">Contact Number</label>
                          <input type="text" id="input-Residential-Address" class="form-control form-control-alternative"value="<?php echo $row["Phone"] ?>" name="phone">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label">Email</label>
                          <input type="text" id="input-city" class="form-control form-control-alternative" value="<?php echo $row["Email"] ?>" name="email">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group focused">
                          <label class="form-control-label">Residential Address</label>
                          <input type="text" id="input-country" class="form-control form-control-alternative" value="<?php echo $row["Address"] ?>" name="address">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn" name="updateBtn">Save</button>
                    <hr class="my-4">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
    mysqli_close($con);
    include('footer.html');
  ?>
</body>