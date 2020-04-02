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
    // For First Slide
    $query = mysqli_query($conn,"select * from news where id=1 ");
    while($row = mysqli_fetch_array($query)){
        $title = $row['title'];
        $des = $row['description'];
        $category = $row['category'];
        $thumbnail = $row['thumbnail'];
        $id = $row['id'];

    }


    $query2 = mysqli_query($conn,"select * from news where id=2 ");
    while($row2 = mysqli_fetch_array($query2)){
        $title2 = $row2['title'];
        $des2 = $row2['description'];
        $category2 = $row2['category'];
        $thumbnail2 = $row2['thumbnail'];
        $id2 = $row['id'];

    }





    $query3 = mysqli_query($conn,"select * from news where id=3 ");
    while($row3 = mysqli_fetch_array($query3)){
        $title3 = $row3['title'];
        $des3 = $row3['description'];
        $category3 = $row3['category'];
        $thumbnail3 = $row3['thumbnail'];
        $id3 = $row['id'];

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
    <a href="news.php" class="brand-logo right"> WorldToday </a>
    
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
        <a href="addNews.php" style="color:white;"> Add News</a>
    </button>
</div>

        
    <div class="container">




    <table class="table table-bordered" >

        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Category</th>
            <th>Thumbnail</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $n=1;
            include('db/connection.php');
            $query = mysqli_query($conn,"select * from news  ");

            while($row = mysqli_fetch_array($query )){
                ?>
                <tr>
                    <td><?php echo $n++ ?></td>
                    <td><?php echo $row['title']?></td>
                    <td><?php echo substr($row['description'],0,200)?> ...</td>
                    <td><?php echo $row['date']?></td>
                    <td><?php echo $row['category']?></td>
                    <td>
                        <img src="images/<?php echo $row['thumbnail'];?>" height="100" width="100" alt="">
                    </td>
                    <td><a class="btn btn-info" href="editNews.php?edit=<?php echo $row['id'];?>">Edit</a></td>
                    <td><a class="btn btn-danger" href="deleteNews.php?delete=<?php echo $row['id'];?>">Delete</a></td>
                    
                 </tr>

            <?php } ?>
      
    
    </table>


</div>    




</body>

</html>