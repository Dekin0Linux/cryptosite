<?php
include 'db/db.php';



if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM activites WHERE id = '$id'";
    $query = mysqli_query($conn,$sql) or die($conn);
    while($row = mysqli_fetch_assoc($query)){
        $uid = $row['id'];
        $date = $row['date'];
        $type = $row['type'];
        $status = $row['status'];
        $detail = $row['detail'];
        $amount = $row['amount'];
    }
}

?>
   
<div>
    <h3 class="text-info">Update Activity</h3>
    <hr>
    
    <form action="updatedata.php" method="post">
        <div class="row">
           <input type="hidden" name="uid" id="" value="<?= $uid?>">
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Date</label>
                    <input type="text" class="form-control" placeholder="Date" name="date" value="<?= $date?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Type</label>
                    <input type="text" class="form-control" placeholder="Type" name="type" value="<?= $type?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Status</label>
                   <input type="text" class="form-control" placeholder="status" name="status" value="<?= $status?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Detail</label>
                    <input type="text" class="form-control" placeholder="Detail" name="detail" value="<?= $detail?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="">Amount</label>
                    <input type="text" class="form-control" placeholder="Amount" name="amount" value="<?= $amount?>">
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="form-group">
                    <label for="">   </label>
                    <input type="submit" class="form-control btn btn-info" name="upd_act" value="Update_act">
                </div>
            </div>
        </div>
            
    </form>
</div>