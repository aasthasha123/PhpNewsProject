<?php
include('db/connection.php');
$id = $_GET['delete'];
$query = mysqli_query($conn,"delete from news where id = '$id' ");
if($query){
    header('location:news.php');
}
else{
    echo "Unable To Delete";
}


?>