<?php 
include '../inc/header.php'; 
$sid = $_SESSION['serverid'];
if(!$sid){
    header('location:sign-in.php');
}
if($sid){ 
    $sql = "SELECT * fROM dash WHERE server_id = '$sid'";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($query)){
        $serverID = $row['server_id'];
        $running = $row['running'];
        $status = $row['status'];
        $hashrate = $row['hashrate'];
        $price = $row['price'];
        
        $mining_bal = $row['mining_bal'];
        $available_bal = $row['available_bal'];
        $earning = $row['earning'];
        $ledger_bal = $row['ledger_balance'];
        
        $mining_btc = $row['mining_btc'];
        $available_btc = $row['available_btc'];
        $earning_btc = $row['earning_btc'];
        $ledger_btc = $row['ledger_btc'];
    }
}else{
    header('location:sign-in.php');
}

?>
    <?php include '../inc/sidebar.php'; ?>
        <main class="main-content position-relative max-height-vh-100 h-25 border-radius-lg ">
            <?php include '../inc/nav.php'; ?>
               
                <div class="my-5 mx-4 vh-100">
                    <h4 class="my-4 text-center">Mining BTC</h4>
                    <div class="container mt-5">
                        <div class="row gx-2">
                            <div class="col-lg-4 shadow rounded p-3">
                               <div>
                                   <div class="text-center my-3">
                                        <h4>Active Rigs</h4>
                                        <h1 class="p-4 border border-success display-1">1</h1> 
                                    </div>
                                    <div class="progress" style="height: 1px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 10%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                               </div>
                            </div>
                            <div class="col-lg-8 p-2 shadow rounded bg-dark text-light">
                                <div class="">
                                    <p>CURRENT MINING PROFITABLITY </p>
                                    <p>$ <?= $mining_bal?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include '../inc/footer.php'; ?>