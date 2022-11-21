<?php
include "../db/db.php";
session_start();

$_SESSION['alertMsg'] = "";

//sIGN UP USER
    if(isset($_POST['signup'])){
        $email = $_POST['email'];
        $uname = $_POST['uname'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        
        //filter email
        $email = filter_var($email,FILTER_VALIDATE_EMAIL);
        
        //Verify Passwords
        if(strlen($password) >= 8){
            if($password === $cpassword){
                $password = password_hash($cpassword, PASSWORD_BCRYPT,array('cost'=>12));

                //server ID randon number
                $server_num = rand(5,15);
                
                //REGISTER USER
                $sql = "INSERT INTO signup (email,username,password,server_id) VALUES ('$email','$uname','$password','$server_num')";
                $query = mysqli_query($conn,$sql) or die($conn);
                
                if($query){
                    header('location:sign-up.php');
                    $_SESSION['alertMsg'] = '<div class="alert alert-success" role="alert">
                        <p class="text-light m-0">Registration Successful</p>
                        <b class="text-light">An email will be sent to you containing your LOGIN and Serve ID</b>
                        </div>';
                }
 
            }else{
                header('location:sign-up.php');
                $_SESSION['alertMsg'] = '<div class="alert alert-danger" role="alert">
                        <p class="text-light m-0">Password Dosen\'t Match</p>
                        </div>';
            }
        } else{
            header('location:sign-up.php');
                $_SESSION['alertMsg'] = '<div class="alert alert-danger" role="alert">
                        <p class="text-light m-0">Password should be more than 8 characters</p>
                        </div>';
            
            session_unset($_SESSION['alertMsg']);
        }   
    }


//LOGIN VERIFICATION
 if(isset($_POST['signin'])){
        $email = $_POST['email'];
        $serverid = $_POST['server_id'];
        $password = $_POST['password'];
        
        //filter email
        $email = filter_var($email,FILTER_VALIDATE_EMAIL);
     
        //FETCH LOGGED IN USE FROM DATABSE
        $sql = "SELECT * FROM signup WHERE login_id = '$serverid'";
        $query = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($query)){
            $dbemail = $row['email'];
            $dbpassword = $row['password'];
            $dbserverID = $row['server_id'];
            
            $_SESSION['loginID'] = $row['login_id'];
        }
        $verifyPassword = password_verify($password,$dbpassword);
     
        if($email == $dbemail && $password == $verifyPassword){
            $_SESSION['serverid'] = $dbserverID;
            header("location:dashboard.php");
        }else{
            header('location:sign-in.php');
                $_SESSION['alertMsg'] = '<div class="alert alert-danger" role="alert">
                <p class="text-light m-0">Invalid Credentials</p>
                </div>';
        }
         
    }else{
//     header('location:sign-in.php');
//                $_SESSION['alertMsg'] = '<div class="alert alert-danger" role="alert">
//                <p class="text-light m-0">You are required to sign in first</p>
//                </div>';
 }


?>