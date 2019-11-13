
<?php
session_start();
error_reporting(0);
include('user/include/dbconnection.php');

     ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>UNIMAS eLaundry</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

</head>
<body id="page-top" style="background-image: url(background.jpg); background-position: center center; background-repeat: no-repeat; background-attachment: absolute; background-size: cover;height: 100vh;">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">UNIMAS eLaundry</a>



    <!-- Navbar -->


  </nav>

  <div id="wrapper">

	<div class="container-fluid">
	<h1 class="text-center">Welcome to <span style="color:#4583ed;">UNIMAS </span>eLaundry</h1><br><br>
	<div class="row">
	<div class="col-md-3" style="border-right: 1px solid gray;">
		<br><br><h2 class="text-center">Login as User</h2><br><br>
		<center><a href="user"><button class="btn btn-primary btn-medium">User Signin</button></a><br><br>
		<a href="user/register.php">Create an account</a></center>
		<br>
	</div>
	<div class="col-md-3">
		<br><br><h2 class="text-center">Login as Provider</h2><br><br>
		<center><a href="provider"><button class="btn btn-primary btn-medium">Provider Signin</button></a><br><br>
		<a href="provider/register.php">Create an account</a></center>
		<br>
	</div>
	</div>
	</div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
