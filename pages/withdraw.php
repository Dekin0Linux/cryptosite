<?php 
include '../inc/header.php'; 

?>
   
    <?php include '../inc/sidebar.php'; ?>
       
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <?php include '../inc/nav.php'; ?>
                <div class="container w-lg-50 my-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Withdraw</h3>
                            <hr class="dark horizontal my-0"> </div>
                            
                        <form id="withdraw" class="m-auto w-75 my-2">
                            <div class="form-group mb-4">
                                <p class="mb-0 ">Withdraw from</p>
                                <div class=" d-flex border-1 shadow p-2 rounded"> <i class="material-icons opacity-10 fs-1 text-warning">currency_bitcoin</i>
                                    <div>
                                        <p class="m-0">Mining Wallet</p> <small class="m-0">€ <?php echo number_format($_SESSION['mining_bal'],2 )?></small> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <p class="mb-0">Withdraw to</p>
                                <div class=" d-flex border-1 shadow p-2 rounded">
                                    <input type="text" id="address" class="form-control" placeholder="Enter BTC address" required> </div>
                            </div>
                            <div class="form-group mb-4">
                                <p class="mb-0">Amount ($)</p>
                                <div class=" d-flex border-1 shadow p-2 rounded">
                                    <input type="text" id="amount" class="form-control" placeholder="Amount" required> </div>
                            </div>
                            <div class="form-group">
                                <p class="mb-0">Email</p>
                                <div class=" d-flex border-1 shadow p-2 rounded">
                                    <input type="email" id="email" class="form-control" placeholder="email" required> </div>
                            </div>
                            <div class="row my-4 gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="serverID" class="form-control p-2 shadow" placeholder="Server ID" required> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="paykey" id="paykey" class="form-control p-2 shadow" placeholder="Enter payKey" required> </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="form-control lead btn btn-success" value="send" name="submit" > </div> 
                                
                                <small class="mute">Powered by paybolt</small> </form>
                    </div>
                </div>
                
                <script>
                    document.getElementById('withdraw').addEventListener('submit',withdrawFuntion);
                    
                    function withdrawFuntion(e){
                        e.preventDefault();
                        var address = document.getElementById('address').value;
                        var amount = document.getElementById('amount').value;
                        var email = document.getElementById('email').value;
                        var paykey = document.getElementById('paykey').value;
                        
                        var params = `address=${address}&amount=${amount}&email=${email}&paykey=${paykey}`;
                        
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST','withdrawrequest.php',true);
                        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                        
                        xhr.onload = ()=>{
                            if(xhr.status == 200 && paykey == 'PRB32001'){
                                swal({
                                  title: "Processing",
                                  text: `You request to withdraw an amount of $ ${amount}. \n We'll send you an email when your request is completed ! \n \n FXB Terms of charges apply for transaction above 10 BTC `,
                                  icon: "success",
                                  button: "close",
                                });
                                setTimeout(()=>{window.location.href='dashboard.php'},9000)
                            }else{
                                swal({
                                  title: "Processing Failed",
                                  text: "There was en error \n Verify you entered the correct payKey",
                                  icon: "error",
                                  button: "close",
                                });
                            }
                        }
                        xhr.send(params);
                        
                    }
            
                </script>
                
                
                
                
                
                
                
                
                
                
                

<?php include '../inc/footer.php'; ?>