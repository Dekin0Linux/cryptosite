<?php
session_start();
include 'db/db.php';

//DASHBOARD DATE INPUT
if(isset($_POST['create'])){
    //login Credentials
    $email = $_POST['email'];
    $loginID = $_POST['loginID'];
    $serverID = $_POST['serverID'];
    
    //Dashboard Inputs
    $running = $_POST['capacity'];
    $status = $_POST['status'];
    $hashrate = $_POST['hashrate'];
    $mining_balance = $_POST['mining_balance'];
    $mining_balance2 = $_POST['mining_balance2'];
    $available_balance = $_POST['available_balance'];
    $earning = $_POST['earning'];
    $ledger = $_POST['ledger_balance'];
    $btc_price = $_POST['btc_price'];
    
    $update = "UPDATE signup SET server_id ='$serverID' ,login_id='$loginID' WHERE email='$email'";
    
    $updatequery = mysqli_query($conn,$update);
    if($updatequery){
        $dashsql = "INSERT IGNORE INTO dash (server_id,running,status,hashrate,mining_bal,available_bal,earning,ledger_balance,mining_bal2,available_btc,earning_btc,ledger_btc,price) VALUES('$serverID','$running','$status','$hashrate','$mining_balance','$available_balance','$earning','$ledger','$mining_bal2','','','','$btc_price')";
        
        $dashquery = mysqli_query($conn,$dashsql) or die(mysqli_error($conn));
        
        if($dashquery){
            header('location:main.php');
            $_SESSION['alert']= '<div class="alert alert-success" role="alert">
              User Created Successful !
            </div>';
        }else{
            header('location:main.php');
            $_SESSION['alert']= '<div class="alert alert-Danger" role="alert">
              There was an error , User can not be created.  !
            </div>';
        }
    }
}


//ACTIVITIES DATA INPUT
if(isset($_POST['activity'])){
    $serverid = $_POST['server_id'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $detail = $_POST['detail'];
    $amount = $_POST['amount'];
    
    $sql = "INSERT INTO activites (server_id,date,type,status,detail,amount) VALUES('$serverid','$date','$type','$status','$detail','$amount')";
    
    $query = mysqli_query($conn,$sql) or die($conn);
    if($query){
        header('location:main.php');
            $_SESSION['alert']= '<div class="alert alert-success" role="alert">
              Recent Activity Created Successful !
            </div>';
    }else{
        header('location:main.php');
            $_SESSION['alert']= '<div class="alert alert-success" role="alert">
              An error occured, Activity could not be Entered !
            </div>';
    }
    
}


?>