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
       <h4 class="my-4">Blank Page</h4>
       
       
    </div>
    
  
    
<?php include '../inc/footer.php'; ?>