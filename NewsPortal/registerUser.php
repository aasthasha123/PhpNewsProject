<?php

    session_start();

?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="style/admin.css" />

    <title>Admin Registration</title>
</head>

<body>
<a href="javascript:history.go(-1)" class="btn" style="float:right;">Go Back</a>


    <div class="container">
    


    <form action="registerUser.php"  method="POST" >
    <h2>Admin Registration</h2>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" >
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>


  <div class="form-group">
    <label for="confirmpwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="confirmpassword">
  </div>



  
  <button type="submit" name="submit" class="btn btn-default" value="register" >Register</button>
</form>


    </div>    

</body>


</html>



<?php

include('db/connection.php');

if(isset( $_POST['submit'] ))
{

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password!=$confirmpassword ){
        echo "<script> alert('Invalid Credentials,Please Try Again!!') </script>";  

    }
    else{

    $query = mysqli_query($conn,"insert into admin_login (email,password) values('$email','$password')");

    if($query){
        // $_SESSION['email'] = $email;
        header('location:admin_login.php');
        
        
        
    }
    }


}


?>