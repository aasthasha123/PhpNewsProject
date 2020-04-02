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
    $query = mysqli_query($conn,"select * from category where id='$id' ");
    while($row = mysqli_fetch_array($query)){
        $category = $row['category_name'];
        $des = $row['description'];

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

    


<form action="edit.php" name="categoryForm" onsubmit="return validateForm()"  method="POST" >
<h2>Update Category</h2>
<div class="form-group">
<label for="category">Category Name:</label>
<input type="text" class="form-control" id="category" name="category" value="<?php echo $category; ?>" >
</div>
<div class="form-group">
<label for="description">Description:</label>
<input type="text" class="form-control" id="description" name="description" value="<?php echo $des; ?>">
</div>

<input type="hidden" name="id" value="<?php echo $_GET['edit'] ;?>" >

<button type="submit" name="submit" class="btn btn-default" value="submit" >Update Category</button>
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
        $category = $_POST['category'];
        $des = $_POST['description'];
        $id = $_POST['id'];
        
        $query1 = mysqli_query($conn,"update category set category_name = '$category' , description='$des' where id='$id' ");

        if($query1){
            header('location:category.php');

        }
        else{
            echo "Category Not Updated!!";
        }

    }


?>
