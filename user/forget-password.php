<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');

if(isset($_POST['submit']))
  {
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' and  MobileNumber ='$mobno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['mobilenumber']=$mobno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UNIMAS eLaundry User - Forget Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body style="background-image: url(../background.jpg); background-position: center center; background-repeat: no-repeat; background-attachment: absolute; background-size: cover;height: 100vh;">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">UNIMAS eLaundry || Recover Password</div>
      <div class="card-body">
         <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
        <form class="form-horizontal" action="" name="login"  method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control"  required="required" >
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="mobilenumber" name="mobilenumber" class="form-control"  required="required">
              <label for="inputPassword">Mobile Number</label>
            </div>
          </div>
          
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="Reset">
        </form>
        <div class="text-center">
          
          <a class="d-block small" href="index.php">Go Back To Sign In!! </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
