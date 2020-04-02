

<?php

include('db/connection.php');
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    
    

$from = "sharma.aastha9632147852@gmail.com";
$to = $email;
$subject = "NewsLetter";
$message = "Welcome To WorldToday!! You will recieve notifications here.";
$headers= "FROM:".$from;

$e = mail($to,$subject,$message,$headers);

header('location:home.php');



}

?>