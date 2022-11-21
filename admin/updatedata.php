<?php
session_start();

include 'db/db.php';

if(isset($_POST['update'])){
    $loginID = $_POST['loginID'];
    $serverID = $_POST['serverID'];
    $email = $_POST['email'];


    //SIGNUP UPDATING
    $updatesql = "UPDATE signup SET login_id='$loginID' WHERE email='$email' ";
    $sendquery =mysqli_query($conn,$updatesql) or die($conn);
    if($sendquery){
        header("location:main.php");
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">
          Login ID Updated successfully.
        </div>';
        
    }
    //DASHBOARD UPDATING
    $running = $_POST['running'];
    $status = $_POST['status'];
    $hashrate = $_POST['hashrate'];
    $mining_bal = $_POST['mining_balance'];
    $mining_bal2 = $_POST['mining_balance2'];
    $available_bal = $_POST['available_balance'];
    $earning = $_POST['earning'];
    $ledger = $_POST['ledger_balance'];
    $btc_price = $_POST['btc_price'];
    
    $upddash = "UPDATE IGNORE dash SET running='$running',status='$status',hashrate='$hashrate', mining_bal='$mining_bal',available_bal='$available_bal',earning='$earning',ledger_balance='$ledger',mining_bal2='$mining_bal2',available_btc='',earning_btc='',ledger_btc='',price='$btc_price' WHERE server_id='$serverID' ";
    
    $sendQuery = mysqli_query($conn,$upddash) or die($conn);
    
    if($sendQuery){
        header("location:main.php");
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">
          Dashboard Updated successfully.
        </div>';
        
    }
}



//UPDATING RECENT ACTIVITIES********************************************************************************
if(isset($_POST['upd_act'])){
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $status = $_POST['status'];
    $detail = $_POST['detail'];
    $amount = $_POST['amount'];
    
    $update_activity= "UPDATE activites SET date='$date',type='$type',status='$status',detail='$detail',amount='$amount' WHERE id='$uid'";
    $result = mysqli_query($conn,$update_activity) or die($conn);
    if($result){
        header("location:main.php");
        $_SESSION['alert'] = '<div class="alert alert-success" role="alert">
          Activity Updated successfully.
        </div>';
    }
    
    
}

?>