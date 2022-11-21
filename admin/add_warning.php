<?php
include 'db/db.php';

//FETCH DATA FROM DASHBOARD
$sql = "SELECT * FROM dash";
$query = mysqli_query($conn,$sql);

//ALERT DATA
if(isset($_POST['alert'])){
    $serverid = $_POST['server_id'];
    $icon = $_POST['icon'];
    $msg = $_POST['msg'];
    $color = $_POST['color'];
    $note = $_POST['note'];

    $sql = "INSERT INTO alert (server_id,icon,msg,color,note) VALUES('$serverid','$icon','$msg','$color','$note')";
    
    $query = mysqli_query($conn,$sql) or die($conn);
    if($query){
        // header('location:main.php?page=alert');
            $_SESSION['alert'] = '<div class="alert alert-success" role="alert">
              Alert Created Successful !
            </div>';
    }else{
        // header('location:main.php?page-alert');
            $_SESSION['alert']= '<div class="alert alert-danger" role="alert">
              An error occured, Alert could not be Created !
            </div>';
    }
}

?>
   
<div>
    <h3 class="text-info">Add Alert</h3>
    <hr>
    
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="row">
            <div class="col-md-3">
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
            <div class="col-md-3">
                <div class="form-group">
                   <label for="">Icon</label>
                    <input type="text" class="form-control" placeholder="icon" name="icon" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                   <label for="">Message</label>
                    <input type="text" class="form-control" placeholder="Message" name="msg" required>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                   <label for="">Note</label>
                    <input type="text" class="form-control" placeholder="Note" name="note">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                   <label for="">Color</label>
                   <select name="color" id="" class="form-select form-control">
                    <option value="">Choose A color</option>
                    <option value="danger">Red</option>
                    <option value="success">Green</option>
                   </select>
                   <!-- <input type="text" class="form-control" placeholder="status" name="color" required> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">   </label>
                    <input type="submit" class="form-control btn btn-info" name="alert" value="Add Alert">
                </div>
            </div>
        </div>
    </form>
</div>
