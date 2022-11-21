<?php
ob_start();
include '../inc/header.php';
include '../db/db.php';

$email = '';
$title = "Email";
$type = "email";
$name = "email";
$btn = "send";

if(isset($_POST['send'])){
  $email = $_POST['email'];

  $sql = "SELECT * FROM signup WHERE email = '$email'";
  $query = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($query)){
    $db_email = $row['email'];
    if($email == $db_email){
      $title = "Enter New Password";
      $type = "password";
      $name = "password";
      $btn = "reset";
      $_SESSION['em'] = $email;
      
    }
  }
}

if(isset($_POST['password'])){
  $password = $_POST['password'];
  $em = $_SESSION['em'];
  if(strlen($password) >= 8){
     //ENCRYPT PASSWORD
  $password = password_hash($password, PASSWORD_BCRYPT,array('cost'=>12));

  $sql = "UPDATE signup SET password='$password' WHERE email = '$em'";
  $query = mysqli_query($conn,$sql) or die($conn);
    if($query){
        header('refresh:3;url=./sign-in.php');
        echo '<div class="alert alert-success" role="alert">
                <p class="text-light m-0">Reset Successful</p><br/>
             </div>';
    }else{
      echo '<div class="alert alert-danger" role="alert">
      <p class="text-light m-0"><b>SERVER ERROR</>Your password could not be reset </p>
      </div>';
    }
  }else{
    echo '<div class="alert alert-danger" role="alert">
      <p class="text-light m-0">Password too weak</p>
      </div>';
  }

  }


?>
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://www.snhu.edu/-/media/images/social/og/finance-degree-cryptocurrency-og.ashx');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-warning shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Reset Password</h4>
                  
                </div>
              </div>
    
              <div class="card-body">
                 
                <form role="form" class="" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                
                  <div class="form-group my-3">
                    <label class="form-label"><?= $title ?></label>
                    <input type="<?= $type; ?>" class="form-control shadow p-2" required name="<?= $name; ?>">
                  </div>
                  
                  <div class="text-center">
                    <input type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2" name="<?= $btn; ?>" value="Reset"/>
                  </div>
          
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                 <i class="fa fa-heart" aria-hidden="true"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Fxbcryptodomain</a>
                Plantinum Version
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="/index.html" class="nav-link text-white">Home</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>