<?php

if(isset($_POST['amount'])&&isset($_POST['email'])){
    $amt = $_POST['amount'];
    $email = $_POST['email'];
    
    $to = "no-reply@fxbcryptodomain.net";
    $subject = "Payment";
    $msg = "email= ". $email ." "."Amount= ".$amt;
    mail($to,$subject,$msg);
}else{
    exit();
}


?>