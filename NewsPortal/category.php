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

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

    <div>

    <nav class="light-blue darken-4">
    <div class="nav-wrapper">
    <a href=" {{ route('news.index') }} " class="brand-logo right"> WorldToday </a>
    
          <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li><a href="news.php">News</a></li>
        
        <li><a href="category.php">Category</a></li>
        
        <li><a  href="logout.php">Logout</a> </li>

        <li><a href="home.php" > Home  </a></li>
        
        
      </ul>
    </div>
  </nav>
    
    </div>


    <div class="text-right" style="float:right;"  >
        <button class="btn btn-danger">
            <a href="addCategory.php" style="color:white;"> Add Category </a>
        </button>
    </div>
    <div class="container" style="margin-top:40px;">

    

    <h3 style="margin-top:30px;margin-bottom:20px;">Categories</h3>



    <table class="table table-bordered" >

        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
            $n=1;
            include('db/connection.php');
            $query = mysqli_query($conn,"select * from category ");
            while($row = mysqli_fetch_array($query )){
                ?>
                <tr>
                    <td><?php echo $n++; ?></td>
                    <td><?php echo $row['category_name']?></td>
                    <td><?php echo substr($row['description'],0,200) ?></td>

                    <td><a class="btn btn-info" href="edit.php?edit=<?php echo $row['id'];?>">Edit</a></td>
                    <td><a class="btn btn-danger" href="delete.php?delete=<?php echo $row['id'];?>">Delete</a></td>
                </tr>

            <?php } ?>
      
    
    </table>




</div>    
    </body>

</html>


<?php



?>
