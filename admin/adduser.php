<?php
include 'db/db.php';

$sql = "SELECT * FROM signup";
$query = mysqli_query($conn,$sql);

?>

<div>
    <h3 class="text-info">Add user</h3>
    <hr>
    
    <form action="createuser.php" method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Select New User Email</label>
                    <select class="form-select form-control" name="email" aria-label="Default select example" required>
                     <option value="" selected>Select A User</option>
                      <?php while($row = mysqli_fetch_array($query)): ;?>
                          <option value="<?= $row[1] ?>"><?= $row[1] ?></option>
                      <?php endwhile;?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Assign Login ID</label>
                    <input type="text" class="form-control" placeholder="Assign Login ID" name="loginID" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Assign Server ID</label>
                    <input type="text" class="form-control" placeholder="Assign Login ID" name="serverID" >
                </div>
            </div>
        </div>
        <h4>User Dashboard</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Running</label>
                    <select class="form-select form-control" aria-label="Default select example" name="capacity">
                      <option value="Low Capacity" selected>Low Capaicty</option>
                      <option value="Full Capacity">Full Capacity</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Status</label>
                    <select class="form-select form-control" name="status" aria-label="Default select example" >
                      <option value="Offline" selected>Offline</option>
                      <option value="Online">Online</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Hasrate</label>
                    <input type="text" class="form-control" placeholder="Hashrate" name="hashrate">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Mining Balance</label>
                    <input type="number" class="form-control" placeholder="Mining Balance" name="mining_balance" step="any">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Available Balance </label>
                    <input type="number" class="form-control" placeholder="Available Balance" name="available_balance" step="any">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Earnings</label>
                    <input type="number" class="form-control" placeholder="earning" name="earning" step="any">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Ledger Balance</label>
                    <input type="number" class="form-control" placeholder="Ledger Balance" name="ledger_balance" step="any">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">BTC price </label>
                    <input type="number" class="form-control" placeholder="Available Balance" name="btc_price" step="any">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Mining Balance2</label>
                    <input type="number" class="form-control" placeholder="Mining Balance" name="mining_balance2" step="any">
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">   </label>
                    <input type="submit" class="form-control btn btn-primary" name="create" value="Create User">
                </div>
            </div>
    </form>
</div>