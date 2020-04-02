<?php
session_start();
if($_SESSION['email'] == true){

}
else{
    header('location:admin_login.php');

}

?>

<?php

    include('db/connection.php');
    $id = $_GET['edit'];
    $query = mysqli_query($conn,"select * from news where id='$id' ");
    while($row = mysqli_fetch_array($query)){
        $title = $row['title'];
        $des = $row['description'];
        $category = $row['category'];

    }

?>

<html>



<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

    <body>


        
    <div class="container">

    


<form action="editNews.php" name="newsForm" onsubmit="return validateForm()"  method="POST" >
<h2>Update Category</h2>
<div class="form-group">
<label for="title">Category Name:</label>
<input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" >
</div>
<div class="form-group">
<label for="description">Description:</label>
<input type="text" class="form-control" id="description" name="description" value="<?php echo $des; ?>">
</div>





<div class="form-group">
<label for="file">Choose Image:</label>
<input type="file" class="form-control img-thumbnail" id="file" name="thumbnail" >
</div>

<div class="form-group">
<label for="description">Category:</label>


    <select name="category" id="" value="<?php echo $category; ?>">
    <?php 
    include('db/connection.php');
    $query = mysqli_query($conn,"select * from category " );
    while($row=mysqli_fetch_array($query)){

    
?>
        <option value="<?php echo $row['category_name']; ?>"> <?php echo $row['category_name']; ?> </option>
   
<?php    }
?>
    </select>










<input type="hidden" name="id" value="<?php echo $_GET['edit'] ;?>" >

<button type="submit" name="submit" class="btn btn-default" value="submit" >Update News</button>
</form>


<script>

    function validateForm(){
        var x = document.forms['newsForm']['title'].value;
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

        $title = $_POST['title'];
        $des = $_POST['description'];
        $category = $_POST['category'];
        $id = $_POST['id'];
        
        $file = $_FILES['thumbnail']['name'];
        $tmp_file = $_FILES['thumbnail']['tmp_name'];
        if($tmp_file){

            move_uploaded_file($tmp_file,"images/$file");
            $query1 = mysqli_query($conn,"update news set title = '$title' , description='$des', category='$category',
            thumbnail='$file' where id='$id' ");
    

        }
        else{
            $query1 = mysqli_query($conn,"update news set title = '$title' , description='$des', category='$category' where id='$id' ");
    
        }

        if($query1){
            header('location:news.php');

        }
        else{
            //header('location:editNews.php?edit=');
            echo "News Not Updated";
        }

    }


?>
