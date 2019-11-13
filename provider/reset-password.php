<?php

session_start();
error_reporting(0);
include('include/dbconnection.php');
error_reporting(0);


if(isset($_POST['submit']))
{
 $mobno=$_SESSION['mobilenumber'];
    $email=$_SESSION['email'];
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"update tbladmin set Password ='$newpassword' where  Email='$email' && MobileNumber = $mobno ");
$row=mysqli_fetch_array($query);
if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
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

  <title>LMS Admin - Reset Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
<script type="text/javascript">
function checkpass()
{
if(document.resetpassword.newpassword.value!=document.resetpassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.resetpassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">LMS || Reset Password</div>
      <div class="card-body">
         
        <form class="form-horizontal" action="" name="resetpassword" onSubmit="return checkpass();" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="newpassword" name="newpassword" class="form-control"  required="required" >
              <label for="inputEmail">New Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="confirmpassword" name="confirmpassword" class="form-control"  required="required">
              <label for="inputPassword">Confirm Password</label>
            </div>
          </div>

          
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="Reset">
        </form>
        <div class="text-center">
          
          <a class="d-block small" href="login.php">Go Back To Sign In!! </a>
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
