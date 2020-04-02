<?php
include('db/connection.php');
$id = $_GET['delete'];
$query = mysqli_query($conn,"delete from category where id = '$id' ");
if($query){
    header('location:category.php');
}
else{
    echo "Unable To Delete";
}


?>