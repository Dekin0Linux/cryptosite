<?php 
include '../inc/header.php'; 
$sid = $_SESSION['serverid'];
if(!$sid){
    header('location:sign-in.php');
}

?>
 
 
  <?php include '../inc/sidebar.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include '../inc/nav.php'; ?>
    
    <div class="my-5 mx-4 vh-100">
       <h4 class="my-4">Recent Activites</h4>
       <div>
           <table class="table align-items-center mb-0 table-striped table-hover">
                  
                  <tbody>
                   <?php 
                    $sql ="SELECT * FROM activites WHERE server_id = '$sid' ORDER BY id DESC";
                    $query = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($query) <= 0){
                        echo '<h3 class="text-center">No Activites Found</h3>';
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
                        <div><p class="m-0"><?= $row['date'] ?></p></div>
                      </td>
                      <td>
                        <p class="m-0"><?= $row['type'] ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="m-0 fw-bold <?php
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
                                        ?>"><?= $row['status'] ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="m-0"><?= $row['detail'] ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="m-0"><?= $row['amount'] ?></p>
                      </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
       </div>
       
    </div>
    
  
    
<?php include '../inc/footer.php'; ?>