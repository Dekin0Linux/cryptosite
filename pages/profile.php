<?php 
include '../inc/header.php'; 

$sid = $_SESSION['serverid'];
if(!$sid){
    header('location:sign-in.php');
}

//USER PROFILE INFO FROM SIGNUP
$sql = "SELECT * FROM signup WHERE server_id = '$sid'";
$query = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($query)){
    $email = $row['email'];
    $username = $row['username'];
    $serverID = $row['server_id'];
}

//SENDING USER REQUEST EMAIL
if(isset($_POST['send'])){
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $msg = $_POST['text_msg'];

  if(!empty($email) && !empty($subject) && !empty($msg)){
    echo '<script>alert("Your Message is successfully sent");</script>';

    $to = 'no-reply@fxbcryptodomain.net';
    mail($to,$subject,$msg);
  }else{
    echo "<script>alert('Please fill the form before you can submit.')</script>";
  }
}


?>

<?php include '../inc/sidebar.php' ?>
 
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <?php include '../inc/nav.php';?>
    <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/user_icon.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?= $username ;?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                <?= $email ;?>
              </p>
            </div>
          </div>
        </div>
        <div class="">
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Profile Information</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Username</strong> &nbsp; <?= $username ?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> N/A</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?= $email ?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location</strong> &nbsp; <?php echo getenv("REMOTE_ADDR"); ?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Server ID</strong> &nbsp; <?= $serverID ;?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          </div>
    </div>

    <!-- CONTACT FORM -->
    <div class="container-fluid mt-4">
        <div class="card p-2">
            <div class="card-title text-center"><h5>Contact Us</h5></div>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="row gy-2">
                    <div class="col-md-6 form-group">
                        <input type="text" class="form-control p-2 border" placeholder="Email" name="email" required>
                    </div>
                    <div class="col-md-6 form-group ">
                        <input type="text" class="form-control border p-2" placeholder="Subject" name="subject" required>
                    </div>
                    <div class="col-md-12 form-group my-2">
                        <textarea name="text_msg" id="" rows="5" placeholder="Message" class="form-control border p-2" required></textarea>
                    </div>
                </div>
                <input type="submit" value="Send" class="btn btn-success d-block" name="send">
            </form>
        </div>
    </div>



<script>
  if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
  }
</script>


<?php include '../inc/footer.php'; ?>