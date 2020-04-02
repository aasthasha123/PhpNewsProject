<?php

    session_start();
    

?>




<html>
<head>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
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







    <div class="row" style="height:20px;">
          <div class="col s12 m12 l12" style="background-color:white;height:50px;">
            <p style="color:green;text-align:center;"> <marquee><h6>
            
            
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





        <section style="padding-top:10px;padding-left:50px;padding-right:50px;" id="main_slider">
  <section class="slider" >
    <ul class="slides" style="height:500px;width:100%;">






      <?php
        
        include('db/connection.php');
        $query = mysqli_query($conn,"select * from news limit 3");

        while($row = mysqli_fetch_array($query)){
            ?>
           <li style="height:100%;width:100%;" >
        <img  src="images/<?php echo $row['thumbnail']; ?>"  width="100%" height="100%"  alt="">
        <div class="caption"  style="padding-top:60px;">
          <h2 class="light grey-text text-lighten-5"> <?php echo $row['title'] ?> </h2>
          <h5 class="light grey-text text-lighten-3" style="color:white;">
          <a style="color:white;text-decoration:underline;" href="detail.php?detail=<?php echo $row['id'];?>">Read More </a>
         

          </h5>
        </div>
      </li>


        <?php } ?>



    </ul>
  </section>






  <h4>Top News</h4>

  <div class="row">



  
  <?php
        
        include('db/connection.php');
        $query = mysqli_query($conn,"select * from news limit 3");

        while($row = mysqli_fetch_array($query)){
            ?>

<div class="col s4 m4 l4" style="margin-right:0px;">
      <div class="card blue-grey darken-1 hoverable">
        <div class="card-content white-text">
        <span class="badge blue " style="color:white;"> <?php echo $row['category'];?>  </span>
        
          <span class="card-title"> <?php echo substr($row['title'],0,50);?> ...  </span>
          <p><?php echo substr($row['description'],0,150); ?> ... </p>
        </div>
        <div class="card-action">
        <a href="detail.php?detail=<?php echo $row['id'];?>">Read More </a>
          
        </div>
    
    </div>
  </div>

        <?php } ?>





  </div>
  













  <section style="padding-left:50px;padding-right:50px;">
          <div class="row" style="padding-bottom:0px;">


          

      <?php
        
        include('db/connection.php');
        $query = mysqli_query($conn,"select * from news limit 2");

        while($row = mysqli_fetch_array($query)){
            ?>
           
           <div class="col s6 m6 l6" style="height:300px;">
              
                
              <div class="row">
                <div class="col s12 m12 l12">
                <div style="background:white;text-align:center;font-size:13px;color:black;">
                <span class="badge blue " style="color:white;"> <?php echo $row['category']?> </span>
    
                <h4>  <?php echo $row['title']?> </h4>
                <img src="images/<?php echo $row['thumbnail']?>" style="height:100px;float:right;" alt="">
                <p><?php echo substr($row['description'],0,150); ?> ... </p>
                        <a href="detail.php?detail=<?php echo $row['id'];?>">Read More </a>

                  </div>

                </div>
              </div>


  </div>


        <?php } ?>


</div>

</section>






<div class="row" style="margin-top:30px;">

  <?php
        
            include('db/connection.php');
            $query = mysqli_query($conn,"select * from news  ");

            while($row = mysqli_fetch_array($query )){
                ?>
               <div class="col s4 m4 l4" style="height:250px;margin-top:30px;">
    
    <div class="row">
      <div class="col s12 m12 l12">
      <div style="background:white;text-align:center;font-size:13px;color:black;">
      <span class="badge blue " style="color:white;"> <?php echo $row['category'];?> </span>
        
      <h4>  <?php echo $row['title'];?> </h4>
      <!-- <img src="images/<?php echo $row['thumbnail']?>" style="height:100px;float:right;"  alt=""> -->
      <p><?php echo substr($row['description'],0,150); ?> ... </p>

  <a href="detail.php?detail=<?php echo $row['id'];?>">Read More </a>

        </div>
        </div>
      </div>
    </div>

            <?php } ?>
      


</div>

</section>














<section style="margin-top:50px;" id="about1">
            <div class="row" style="padding-bottom:50px;">
              
              <div class="col s6 m6 l6" style="height:500px;width:700px;" id="img1">


              <video width="700" height="400" controls>
                <source src="images/video_news.mp4" type="video/mp4">
              Your browser does not support the video tag.
            </video>



              </div>

              <div class="col s8 m8 l8" style="margin-left:100px;height:500px;width:508px;">
                <ul class="collection">
                  <h5 style="text-align:center"><b>Latest Trends</b></h5>
                  <li class="collection-item avatar">
                    <img src="images/Twitter-featured.png" alt="" class="circle">
                    <span class="title">
                      <b>#lockdown</b>
                      <p>1000+ Tweets</p>
                    </span>
                    
                   </li>
                  <li class="collection-item avatar">
                    <img src="images/Twitter-featured.png" alt="" class="circle">
                    <span class="title">
                      <b>#corona</b>
                      <p>740+ Tweets</p>
                    </span>
                    </li>


                    <li class="collection-item avatar">
                    <img src="images/Twitter-featured.png" alt="" class="circle">
                    <span class="title">
                      <b>#pmModi</b>
                      <p>1000+ Tweets</p>
                    </span>
                    </li>


                    <li class="collection-item avatar">
                    <img src="images/Twitter-featured.png" alt="" class="circle">
                    <span class="title">
                      <b>#china</b>
                      <p>740+ Tweets</p>
                    </span>
                    </li>
                 
                  </ul>
              </div>

            </div>

          </section>















          <section style="padding-left:50px;padding-top:30px;background-color:#ADD8E6;height:200px;" id="about" >
          <div class="row">
            <div class="col s6 m6 l6" id="ab1">
              <h3><b>Contact Us</b></h3>
              <p>Phone : <b>+91 99999999</b> </p>
              <p>Email : <b>aasthasharma738@gmail.com</b></p>
            </div>
            <div class="col s6 m6 l6" id="ab2">
            
              <form  action="email.php" name="newsletterForm" onsubmit="return validateForm()"  method="POST" >
            
            <h4><b>Subscribe For Newsletter!</b></h4>
            <input  type="email" name="email" id="">
            <input type="submit" name="submit" class="btn">
</form>


<script>

    function validateForm(){
        var x = document.forms['newsletterForm']['email'].value;
        if(x==""){
            alert("Please write something !!!");
            return false;
        }
    }

</script>



            </div>
          </div>
          </section>












  <script>

const slider = document.querySelector('.slider');
      M.Slider.init(slider,{
        indicators: false,
        height:500,
        transition:1000,
        interval:5000,

      })

</script>






</body>

</html>


