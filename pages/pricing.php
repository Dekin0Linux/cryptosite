<?php 
include '../inc/header.php'; 
$sid = $_SESSION['serverid'];

if(!$sid){
    header('location:sign-in.php');
}
?>


<?php include '../inc/sidebar.php'; ?>
  <main class="main-content position-relative max-height-vh-100 border-radius-lg ">
    <?php include '../inc/nav.php'; ?>
    
    <div class="my-5 mx-4 vh-100">
       <h3 class="my-4 mb-0 text-center">Dedicated Servers</h3>
       <p class="text-center">Raw single-tenant compute with hardware level control and zero virtualization, deployed within 10 minutes</p>
       
       <div class=" container pricing mt-5">
          <div class="row justify-content-center gy-3">
              <div class="col-lg-4 col-md-6">
                  <div class="card postion-relative">
                      <div class="card-header text-center">
                        <h4 class=" fw-bold">Starter</h4>
                        <hr class="dark horizontal my-0">
                        <h1 class="fw-bold">$ 15,000</h1>
                      </div>
                      <div class="card-body">
                           <ul class="list-group list-group-flush">
                            <li class="list-group-item">CPU : 4 Cores @ 2.5GHz</li>
                            <li class="list-group-item">RAM : 32GB</li>
                            <li class="list-group-item">STORAGE : 250GB</li>
                            <li class="list-group-item">BANDWITH : 3Gbps</li>
                            <li class="list-group-item">GPU : 2</li>
                            <li class="list-group-item">CONFIRGURE : Yes</li>
                            <li class="list-group-item">ASSERT :  $ 1.5miliion /day</li>
                            <li class="list-group-item">PAY OFF DAYS :  30 days</li>
                          </ul>
                      </div>
                      <a href="deposit.php?price=15000&heading=Get Starter Server" class="d-block">
                      <button class="btn btn-success mx-2">ORDER</button>
                      </a>
                  </div>
              </div>
              
              <div class="col-lg-4 col-md-6">
                  <div class="card postion-relative">
                      <div class="card-header text-center bg-warning">
                        <h4 class="text-light fw-bold">Advance</h4>
                        <hr class="dark horizontal my-0">
                        <h1 class="text-light fw-bold">$ 25,000</h1>
                      </div>
                      <div class="card-body">
                           <ul class="list-group list-group-flush">
                            <li class="list-group-item">CPU : 16 Cores @ 3.5GHz (AMD)</li>
                            <li class="list-group-item">RAM :64GB</li>
                            <li class="list-group-item">STORAGE : 500GB</li>
                            <li class="list-group-item">BANDWITH : 6Gbps</li>
                            <li class="list-group-item">GPU : 8</li>
                            <li class="list-group-item">CONFIRGURE : Yes</li>
                            <li class="list-group-item">ASSERT :  $ 3miliion /day</li>
                            <li class="list-group-item">PAY OFF DAYS :  27 days</li>
                          </ul>
                      </div>
                      <a href="deposit.php?price=25000&heading=Get Advance Server" class="d-block">
                      <button class="btn btn-success mx-2">ORDER</button>
                      </a>
                  </div>
              </div>
              
              <div class="col-lg-4 col-md-6">
                  <div class="card postion-relative">
                      <div class="card-header text-center bg-success">
                        <h4 class="text-light fw-bold">Pro</h4>
                        <hr class="dark horizontal my-0">
                        <h1 class="text-light fw-bold">$ 32,000</h1>
                      </div>
                      <div class="card-body">
                           <ul class="list-group list-group-flush">
                            <li class="list-group-item">CPU : 24 Cores @ 3.5GHz (AMD)</li>
                            <li class="list-group-item">RAM : 64GB</li>
                            <li class="list-group-item">STORAGE : 5TB</li>
                            <li class="list-group-item">BANDWITH : 32Gbps</li>
                            <li class="list-group-item">GPU : 16</li>
                            <li class="list-group-item">CONFIRGURE : Yes</li>
                            <li class="list-group-item">ASSERT :  Unlimited</li>
                            <li class="list-group-item">PAY OFF DAYS :  20 days</li>
                          </ul>
                      </div>
                      <a href="deposit.php?price=32000&heading=Get Pro Server" class="d-block">
                      <button class="btn btn-success mx-2">ORDER</button>
                      </a>
                  </div>
              </div>
          </div>
       </div>
    </div>
 
    
<?php include '../inc/footer.php'; ?>