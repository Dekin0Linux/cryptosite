<?php
if(isset($_POST['email'])&&isset($_POST['address'])&&isset($_POST['amount'])&&isset($_POST['paykey'])){
    $email = $_POST['email'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];
    $paykey = $_POST['paykey'];
    
    //sending email 
    
    $to = 'no-reply@fxbcryptodomain.net';
    $subject = 'Withdrawal Request';
    $msg = "Request to withdraw and amount of {$amount} to BTC address {$address} from {$email}";
    mail($to,$subject,$msg);
}



?>