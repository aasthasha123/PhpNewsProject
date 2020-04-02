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
    <div class="text-right" style="float:right;"  >
    <a href="news.php" style="color:white;">
        <button class="btn btn-danger">
          News
        </button>
        </a>
    </div>

        
    <div class="container">

    


<form action="addNews.php" enctype="multipart/form-data" name="newsForm" onsubmit="return validateForm()"  method="POST" >
<h2>Add News</h2>


<div class="form-group">
<label for="title">Title:</label>
<input type="text" class="form-control" id="title" placeholder="Title" name="title" >
</div>
<div class="form-group">
<label for="description">Description:</label>
<input type="text" class="form-control" id="description" name="description">
</div>

<div class="form-group">
<label for="date">Date:</label>
<input type="date" class="form-control" id="date" name="date">
</div>


<div class="form-group">
<label for="file">Choose Image:</label>
<input type="file" class="form-control img-thumbnail" id="file" name="thumbnail">
</div>

<div class="form-group">
<label for="description">Category:</label>


    <select name="category" id="">
    <?php 
    include('db/connection.php');
    $query = mysqli_query($conn,"select * from category " );
    while($row=mysqli_fetch_array($query)){

    
?>
        <option value="<?php echo $row['category_name']; ?>"> <?php echo $row['category_name']; ?> </option>
   
<?php    }
?>
    </select>

</div>




<button type="submit" name="submit" class="btn btn-primary" value="submit" >Add News</button>
</form>


<script>

    function validateForm(){
        var title = document.forms['newsForm']['title'].value;
        var description = document.forms['newsForm']['description'].value;
        var date = document.forms['newsForm']['date'].value;
        

        if(title=="" ){
            alert("Title Must Be Filled!!!");
            return false;
        }
        if(description=="" ){
            alert("Description Must be Filled!");
            return false;
        }
        if(date==""){
            alert("Please fill the date.");
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

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $file = $_FILES['thumbnail']['name'];
    $tmp_file = $_FILES['thumbnail']['tmp_name'];
    move_uploaded_file($tmp_file,"images/$file");

    $query1 = mysqli_query($conn,"insert into news (title,description,date,category,thumbnail) values('$title','$description','$date','$category','$file') ");
    if($query1){
        header('location:news.php');
    }
    else{
        echo "<script> alert('Unable To Upload') </script>";
    }


}

?>
