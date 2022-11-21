<?php
include 'db/db.php';

$sid = $_GET['id'];

$loginsql = "SELECT * FROM signup WHERE server_id = '$sid' ";
$query = mysqli_query($conn,$loginsql);
while($row = mysqli_fetch_assoc($query)){
    $email = $row['email'];
    $serverId = $row['server_id'];
    $loginId = $row['login_id'];
}

//DASHBOARD QUERY
$dashquery = "SELECT * FROM dash WHERE server_id = '$sid' ";
$query = mysqli_query($conn,$dashquery);
while($row = mysqli_fetch_assoc($query)){
    $running = $row['running'];
    $status = $row['status'];
    $hashrate = $row['hashrate'];
    $mining_balance = $row['mining_bal'];
    $mining_balance2 = $row['mining_bal2'];
    $available_balance = $row['available_bal'];
    $earning = $row['earning'];
    $ledger = $row['ledger_balance'];
    $btc_price = $row['price'];
}

//Activity Query
$activity_sql = "SELECT * FROM activites WHERE server_id = '$sid' ORDER BY id DESC ";
$activity_query = mysqli_query($conn,$activity_sql) or die($conn);

//Alert Query
$alert_sql = "SELECT * FROM alert WHERE server_id = '$sid' ORDER BY id DESC ";
$alert_query = mysqli_query($conn,$alert_sql) or die($conn);
?>




<div>
    <h3 class="text-info">Edit & Dash user</h3>
    <hr>
    
    <form action="updatedata.php" method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">User Email</label>
                   <input type="email" class="form-control" value="<?= $email?>" placeholder="Email" name="email">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Update Login ID</label>
                    <input type="text" class="form-control" placeholder="Update Login ID" name="loginID" value="<?= $loginId?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Update Server ID</label>
                    <input type="text" class="form-control" placeholder="Update Login ID" name="serverID" value="<?= $serverId?>">
                </div>
            </div>
        </div>
        
        
        <h4>User Dashboard</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Running</label>
                    <input type="text" class="form-control" value="<?= $running ?>" name="running">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Status</label>
                    <input type="text" class="form-control" value="<?= $status ?>" name="status">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Hasrate</label>
                    <input type="text" class="form-control" placeholder="Hashrate" name="hashrate" value="<?= $hashrate ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Mining Balance</label>
                    <input type="number" class="form-control" placeholder="Mining Balance" name="mining_balance" value="<?= $mining_balance ?>" step="any">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Available Balance </label>
                    <input type="number" class="form-control" placeholder="Available Balance" name="available_balance"
                    value="<?= $available_balance?>" step="any">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Earnings</label>
                    <input type="number" class="form-control" placeholder="earning" name="earning" value="<?= $earning?>" step="any">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Ledger Balance</label>
                    <input type="number" class="form-control" placeholder="Ledger Balance" name="ledger_balance" value="<?= $ledger?>" step="any">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">BTC price </label>
                    <input type="number" class="form-control" placeholder="Available Balance" name="btc_price" value="<?= $btc_price?>" step="any">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Mining Balance2</label>
                    <input type="number" class="form-control" placeholder="Mining Balance" name="mining_balance2" value="<?= $mining_balance2 ?>" step="any">
                </div>
            </div>
            
            
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="">   </label>
                <input type="submit" class="form-control btn btn-info" name="update" value="update">
            </div>
        </div>
    </form>
    <hr>
    
    <!-- User Activites List -->
    <h4 class="text-info">User Activities</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID #</th>
          <th scope="col">Date</th>
          <th scope="col">Type</th>
          <th scope="col">Status</th>
          <th scope="col">Detail</th>
          <th scope="col">Amount</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
       <?php while($row = mysqli_fetch_assoc($activity_query)): 
            
        ?>
        <tr>
          <th scope="row"><?= $row['id']; ?></th>
          <td><?= $row['date']; ?></td>
          <td><?= $row['type']; ?></td>
          <td><?= $row['status']; ?></td>
          <td><?= $row['detail']; ?></td>
          <td><?= $row['amount']; ?></td>
          <td>
              <a href="main.php?page=editactivity&id=<?= $row['id'];?>" class="btn btn-info btn-sm">Edit</a>
              <a href="main.php?page=delete&del_id=<?= $row['id'];?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Would you like to delete record?')">Delete</a>
          </td>
        </tr>
        <?php endwhile;?>
      </tbody>
      
    </table>



    <!-- Alerts List -->
    <h4 class="text-info">User Alerts</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID #</th>
          <th scope="col">Icon</th>
          <th scope="col">Msg</th>
          <th scope="col">Color</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
       <?php while($row = mysqli_fetch_assoc($alert_query)): 
            
        ?>
        <tr>
          <th scope="row"><?= $row['id']; ?></th>
          <td><?= $row['icon']; ?></td>
          <td><?= $row['msg']; ?></td>
          <td><?= $row['color']; ?></td>
          <td>
              <!-- <a href="main.php?page=editactivity&id=<?= $row['id'];?>" class="btn btn-info btn-sm">Edit</a> -->
              <a href="main.php?page=delete&act_id=<?= $row['id'];?>" class="btn btn-danger btn-sm" onclick="javascript:return confirm('Would you like to delete record?')">Delete</a>
          </td>
        </tr>
        <?php endwhile;?>
      </tbody>
      
    </table>
    
    

   
    
    
    
</div>