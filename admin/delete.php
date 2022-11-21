<?php

include 'db/db.php';


//DELETING ACTIVITY
if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    
    $del_sql = "DELETE FROM activites WHERE id = '$del_id' ";
    $del_query = mysqli_query($conn,$del_sql) or die($conn);
    if($del_query){
            $_SESSION['alert']= '<div class="alert alert-success" role="alert">
              Activity Deleted Successful !
            </div>';
    }
    
}

//DELETING ACTIVITY
if(isset($_GET['act_id'])){
  $act_id = $_GET['act_id'];
  
  $act_sql = "DELETE FROM alert WHERE id = '$act_id' ";
  $act_query = mysqli_query($conn,$act_sql) or die($conn);
  if($act_query){
          $_SESSION['alert']= '<div class="alert alert-success" role="alert">
            Activity Deleted Successful !
          </div>';
  }
  
}

//DELETING A USER
if(isset($_GET['del_user'])){
  $del_user = $_GET['del_user'];
  
  //DELETING ALL ACTIVITY WITH SERVER ID
  $del_act_sql = "DELETE FROM activites WHERE server_id = '$del_user' ";
  $del_act_query = mysqli_query($conn,$del_act_sql) or die($conn);

  if($del_act_query){
    $user_act_sql = "DELETE FROM alert WHERE server_id = '$del_user' ";
    $user_act_query = mysqli_query($conn,$user_act_sql) or die($conn);

    if($user_act_query){
      $del_dash_sql = "DELETE FROM dash WHERE server_id = '$del_user' ";
      $del_dash_query = mysqli_query($conn,$del_dash_sql) or die($conn);

        if($del_dash_query){
          $del_user_sql = "DELETE FROM signup WHERE server_id = '$del_user' ";
          $del_user_query = mysqli_query($conn,$del_user_sql) or die($conn);
          if($del_user_query){
            $_SESSION['alert']= '<div class="alert alert-success" role="alert">
            Activity Deleted Successful !
            </div>';
          }
        }
    }



  }
  
}


?>