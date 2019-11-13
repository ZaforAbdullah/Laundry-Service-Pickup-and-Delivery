<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['ldaid']==0)) {
  header('location:logout.php');
  } else{


$lmsaid=$_SESSION['ldaid'];
  ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LMS</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  
    <!-- Navbar -->
    
<?php include('include/header.php');?>
  <div id="wrapper">

    <!-- Sidebar -->
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
<?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
?>
<h5 align="center" style="color:blue">Laundry Request Count Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
<hr />

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
<tr>
<th>S.NO</th>
<th>Total Requests</th>
<th>New Requests</th>
<th>Accepted Requests</th>
<th>Inprocess Requests</th>
<th>Finished Requests</th>
</tr>
</thead>
<?php
$ret=mysqli_query($con,"select month(DateofLaundry) as lmonth,year(DateofLaundry) as lyear,count(id) as totalcount,count(if(Status='0',0,null)) as newrequest,count(if(Status='1',0,null)) as acceptrequest,count(if(Status='2',0,null)) as inprocessrequest,count(if(Status='3',0,null)) as finishedrequest from tbllaundryreq where tbllaundryreq.provider= '$lmsaid' and  DateofLaundry between '$fdate' and '$tdate' group by lmonth,lyear");
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
              <td><?php  echo $total=$row['totalcount'];?></td>
                  <td><?php  echo $ntotal=$row['newrequest'];?></td>
                  <td><?php  echo $atotl=$row['acceptrequest'];?></td>
                <td><?php  echo $intotal=$row['inprocessrequest'];?></td>
                <td><?php  echo $ffftotal=$row['finishedrequest'];?></td>
                 
                </tr>
                <?php
$ftotal+=$total;
$fntotal+=$ntotal;
$fatotl+=$atotl;
$fintotal+=$intotal;
$fftotal+=$ffftotal;

}?>
   
      <tr>
                  <td>Total </td>
              <td><?php  echo $ftotal;?></td>
                  <td><?php  echo $fntotal;?></td>
                  <td><?php  echo $fatotl;?></td>
                <td><?php  echo $fintotal;?></td>
                <td><?php  echo $fftotal;?></td>
                 
                </tr>

</table>

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
          <a class="btn btn-primary" href="logout.php">Logout</a>
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
<?php }  ?>