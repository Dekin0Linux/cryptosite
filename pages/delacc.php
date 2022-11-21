<?php

include '../db/db.php';
if(isset($_GET['id']))
$del_acc_id = $_GET['id'];

//Delete Linked account
$del_sql = "DELETE FROM linkedacc WHERE id = '$del_acc_id'";
$query = mysqli_query($conn,$del_sql) or die($conn);
if($query){
    header("location:dashboard.php");
}


?>