<?php 
ob_start();
include 'inc/header.php';
include 'db/db.php';



if(isset($_POST['login'])){
    $u_email = $_POST['email'];
    $u_password = $_POST['password'];
    
    $sql = "SELECT * FROM signup";
    $result = mysqli_query($conn,$sql) or die($conn);
    
    while($row = mysqli_fetch_assoc($result)){
        $email = $row['email'];
        $password = $row['password'];
    }
    
    $verifyPassword = password_verify($u_password,$password);
    
    if(($u_email == $email) && ($u_password == $verifyPassword)){
        header('location:main.php');
        
    }else{
//        header('location:index.php');
        echo '<div class="alert alert-warning" role="alert">
         Incorrect Logins
        </div>';

    }
}

?>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login to ADMIN</h1>
                                    </div>
                                    <form class="user" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div>
                                            <input type="submit" value="Login" name="login" class="form-control btn btn-primary">
                                        </div>
                                        
                                    </form>
                                

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>