<?php


session_start();

?>



<?php

    include('db/connection.php');
    $id = $_GET['detail'];
    $query = mysqli_query($conn,"select * from news where id='$id' ");
    while($row = mysqli_fetch_array($query)){
        $title = $row['title'];
        $category = $row['category'];
        $des = $row['description'];
        $thumbnail = $row['thumbnail'];

    }

?>


<html>
<head>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>
<body>
<div>

<nav class="light-blue darken-4">
<div class="nav-wrapper">
<a href="home.php" class="brand-logo right"> WorldToday </a>

      <ul id="nav-mobile" class="left hide-on-med-and-down">
    <li><a href="home.php" > Home  </a></li>

    
  <?php
    
    include('db/connection.php');
    $query = mysqli_query($conn,"select * from category");

    while($row = mysqli_fetch_array($query)){
        ?>
       <li><a href="categoryPage.php?category=<?php echo $row['category_name'];?>" > <?php echo $row['category_name'];?> </a></li>

    <?php } ?>


    <li><a href="adminPanel.php">Admin Panel</a></li>
    
  </ul>
</div>
</nav>

</div>









 <a href="javascript:history.go(-1)" class="btn">Go Back</a>


<div  style="margin-left:100px;margin-right:350px;padding-top:0px;">
<h3 style="text-decoration:underline;">
        <?php echo $title;?> 
    <span class="badge blue " style="color:white;margin-top:10px;"> <?php echo $category?>  </span>
    
    </h3>

     

</br>
    <img style="height:70%"  src="images/<?php echo $thumbnail;?>" alt="">

    
    <h6 style="margin-top:50px;">
    <?php echo $des;?>
    </h6>
</div>

    

</body>


</html>
