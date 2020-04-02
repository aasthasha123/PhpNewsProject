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







<!-- 
    <div class="row" style="height:20px;">
          <div class="col s12 m12 l12" style="background-color:white;height:50px;">
            <p style="color:green;text-align:center;transform:translateY(-0px)"> <marquee><h6>
            
            
            Asian Paints	1,606.20	||
Axis Bank	359.70		||
Bajaj Auto	2,059.60		||
Bajaj Finance	2,546.45		||
Bharti Airtel	448.90		||
HCL Tech	431.80		||
HDFC	1,754.10		||
HDFC Bank	905.05		||
Hero Motocorp	1,660.15		||
HUL	2,140.30		||
ICICI Bank	340.10	 	||
IndusInd Bank	411.00  	||
Infosys	653.55	||
ITC	162.90	||
Kotak Mahindra	1,397.95 	||
Larsen	836.90		||
M&M	295.65		||
Maruti Suzuki	4,645.75 	||	
            
            
            </h6></marquee> </p>
          </div>
        </div>

 -->


 <a href="javascript:history.go(-1)" class="btn">Go Back</a>


<div  style="margin-left:100px;margin-right:350px;padding-top:20px;">


<h2 style="text-decoration:underline;">
        <?php echo $title;?>
    </h2>



    <img style="height:70%"  src="images/<?php echo $thumbnail;?>" alt="">

    
    <p>
    <?php echo $des;?>
    </p>
</div>

    

</body>


</html>