<?php
include 'db/db.php';

$sql = "SELECT * FROM dash";
$query = mysqli_query($conn,$sql);

?>
   
<div>
    <h3 class="text-info">Add Activity</h3>
    <hr>
    
    <form action="createuser.php" method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Select ServerID</label>
                    <select class="form-select form-control" name="server_id" aria-label="Default select example" required>
                     <option value="" selected>Choose ServerID</option>
                      <?php while($row = mysqli_fetch_assoc($query)): ;?>
                          <option value="<?= $row['server_id'] ?>"><?= $row['server_id'] ?></option>
                      <?php endwhile;?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Date</label>
                    <input type="text" class="form-control" placeholder="Date" name="date" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Type</label>
                    <input type="text" class="form-control" placeholder="Type" name="type" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Status</label>
                   <input type="text" class="form-control" placeholder="status" name="status" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Detail</label>
                    <input type="text" class="form-control" placeholder="Detail" name="detail">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Amount</label>
                    <input type="text" class="form-control" placeholder="Amount" name="amount">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">   </label>
                    <input type="submit" class="form-control btn btn-info" name="activity" value="Add Activity">
                </div>
            </div>
        </div>
    </form>
</div>