<?php
session_start();
if($_SESSION['email'] == true){

}
else{
    header('location:admin_login.php');

}

?>


<html>
<head>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



</head>
<body>

    <!-- <div>

    <nav class="light-blue darken-4">
    <div class="nav-wrapper">
    <a href=" {{ route('news.index') }} " class="brand-logo right"> WorldToday </a>
    
          <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="home.php" > Home  </a></li>
        <li><a href="news.php">News</a></li>
        
        <li><a href="category.php">Category</a></li>
        <li><a  href="logout.php">Logout</a> </li>
        
        
      </ul>
    </div>
  </nav>
    
    </div> -->


    <div class="text-right" style="float:right;"  >
        <button class="btn btn-danger">
            <a href="category.php" style="color:white;"> Category </a>
        </button>
    </div>


        
    <div class="container">

    


<form action="addCategory.php" name="categoryForm" onsubmit="return validateForm()"  method="POST" >
<h2>Add Category</h2>

<div class="form-group">
<label for="category">Category Name:</label>
<input type="text" class="form-control" id="category" placeholder="Add Category Name" name="category" >
</div>
<div class="form-group">
<label for="description">Description:</label>
<input type="text" class="form-control" id="description" name="description">
</div>

<button type="submit" name="submit" class="btn btn-primary" value="submit" >Add Category</button>
</form>


<script>

    function validateForm(){
        var x = document.forms['categoryForm']['category'].value;
        if(x==""){
            alert("Please write something !!!");
            return false;
        }
    }

</script>




</div>    
    </body>

</html>


<?php

include('db/connection.php');
if(isset($_POST['submit'])){

    $category_name = $_POST['category'];
    $description = $_POST['description'];

    $check=mysqli_query($conn,"select * from category where category_name = '$category_name' ");
    if(mysqli_num_rows($check)>0 ){
        echo "<script> alert('Category Name Already Present!') </script>";
        exit();
    }

    else{

    

    $query = mysqli_query($conn,"insert into category(category_name,description) values('$category_name','$description') ");
    if($query){
       header('location:category.php');

    }
    else{
        echo "<script> alert('Try Again') </script>";

    }
    }
}

?>