<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['lduid']==0)) {
  header('location:logout.php');
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

  <title>eLaundry || Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <?php include('include/header.php');?>
   

  <div id="wrapper">

     <?php include('include/sidebar.php');?>
    

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
       
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>

                <?php 
$usserid=$_SESSION['lduid'];
                $query1=mysqli_query($con,"Select * from tbllaundryreq where Status ='0' && UserID='$usserid'");
$reqcount=mysqli_num_rows($query1);
?>
                <div class="mr-5"><?php echo $reqcount;?>  New Request </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="new-request.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <?php $query2=mysqli_query($con,"Select * from tbllaundryreq where Status ='1' && UserID='$usserid'");
$acccount=mysqli_num_rows($query2);
?>
                <div class="mr-5"><?php echo $acccount;?> Accept!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="accept-request.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

               <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <?php $query3=mysqli_query($con,"Select * from tbllaundryreq where Status ='2' && UserID='$usserid'");
$inpcount=mysqli_num_rows($query3);
?>
                <div class="mr-5"><?php echo $inpcount;?> Inprocess!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="inprocess-request.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
               <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <?php $query4=mysqli_query($con,"Select * from tbllaundryreq where Status ='3' && UserID='$usserid'");
$fincount=mysqli_num_rows($query4);
?>
                <div class="mr-5"><?php echo $fincount;?> Finish!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="finish-request.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        
        </div>
<?php

$ret=mysqli_query($con,"select * from tblpricelist");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
      
<h3 style="text-align: center;">Laundry Services Price(Per Unit)</h3>
<h5 style="text-align: center;">Provider: 
<?php  
$ret1=mysqli_query($con,"select * from tbladmin where id = '".$row['provider']."' ");
$row1=mysqli_fetch_array($ret1);
echo $row1['AdminName'];
?>
</h5>
<table border="1" class="table table-bordered mg-b-0">

<tr>
    <th>Wash</th>
    <td>RM <?php  echo $row['TopWear'];?></td>
  </tr>


   <tr>
    <th>Iron</th>
    <td>RM <?php  echo $row['BottomWear'];?></td>
  </tr>
 
<tr>
    <th>Dry Wash</th>
    <td>RM <?php  echo $row['Woolen'];?></td>
  </tr>
  
 
  
  
  <tr>

    <th>Other Price</th>
    <td>Other Price depend upon Service variety (other than above three category)</td>
  </tr>
  



</table>

  



<?php } ?>

        

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
       <?php include('include/footer.php');?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
