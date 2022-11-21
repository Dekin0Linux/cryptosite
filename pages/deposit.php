<?php 
include '../inc/header.php';

$heading = "";
if(isset($_GET['price'])  && isset($_GET['heading'])){
    $serverPrice = $_GET['price'];
    number_format($serverPrice);
    $heading = $_GET['heading'];
}
?>
 
  <?php include '../inc/sidebar.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include '../inc/nav.php'; ?>
    
    
    <div class="container w-lg-50 my-5">

        <div class="card">
            <div class="card-header">
                <h3><?php echo !$heading ? "Deposit" : $heading ?></h3>
                <hr class="dark horizontal my-0">
            </div>
            
            <form id="depositForm" class="m-auto w-75 my-2">
                <div class="form-group">
                    <input type="number" name="amount" class="form-control text-center p-4 fw-bold fs-1" placeholder="$0.0" required value="<?= $serverPrice ?>" id="amount"/>
                    
                    <p class="text-center ">Scan QRcode or use address below to complete payment</p>
                </div>
                
                <div class="form-group text-center my-4">
                   <img src="../assets/img/download.png" alt="" width="200rem" class="img-fluid mb-2"><br/>
                    <p class="text-center text-dark my-2 ">bc1q9r4hlnprvjhfl75fn4zklgy4zcv5u2cx4cavjm </p>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="form-group p-2">
                            <input type="text" name="serverID" class="form-control p-2 shadow" placeholder="Server ID" required value="<?= $serverID ?>">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group p-2">
                            <input type="text" name="email" class="form-control p-2 shadow" placeholder="Enter your email" required value="<?= $email?>" id="email">
                        </div>
                    </div>
                </div>
                <div>
                    <input type="submit" class="form-control lead btn btn-success" value="send" name="deposit">
                </div>
                
                <small class="mute">Powered by paybolt</small>
            </form>
        </div>
        
        
        <p class="fw-bold text-center text-danger mt-3"><?php echo !$heading ? "Please note that the Minimum Amount to deposit is : 100$" : "" ?></p>
        <div class="p-2 bg-info rounded">
            <h6 class=" text-light text-center">
                Scan the QRcode or copy and paste the address in your blockchain app to make payment.
                We require two confirmation to reflect your balance, your money will be added Automatically once your transaction gets 2 confirmation.
            </h6>
        </div>
    </div>
    
    
    <script>
        document.getElementById('depositForm').addEventListener('submit',deposit);
        
        function deposit(e){
            e.preventDefault();
            var amount = document.getElementById('amount').value;
            var email = document.getElementById('email').value;
//            var params = "amount="+amount;
            var params = `amount=${amount}&email=${email}`;
            
            var xhr = new XMLHttpRequest();
            xhr.open('POST','modal.php',true);
            xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
            
            xhr.onload = function(){
                if(this.status == 200 && amount >= 100){
                    swal({
                      title: "Processing ",
                      text: "We'll send you an email once your transaction is confirmed !",
                      icon: "success",
                      button: "close",
                    });
                    console.log(xhr.responseText)
                    setTimeout(()=>{window.location.href='dashboard.php'},7000)
                }else{
                    swal({
                      title: "Processing Failed",
                      text: "There was en error (Make sure the amount is above $ 100)",
                      icon: "error",
                      button: "close",
                    });
                }
            }
            xhr.send(params);
            
        }
    </script>
  
    

<?php include '../inc/footer.php'; ?>