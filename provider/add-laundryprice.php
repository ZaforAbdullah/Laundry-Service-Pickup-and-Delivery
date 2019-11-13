<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['ldaid']==0)) {
  header('location:logout.php');
  } else{
$lmsaid=$_SESSION['ldaid'];

if(isset($_POST['submit']))
  {
    $topwear=$_POST['topwear'];
    $bootomwear=$_POST['bottomwear'];
    $woolencloth=$_POST['woolencloth'];
    $query=mysqli_query($con, "insert into  tblpricelist(TopWear,BottomWear,Woolen,provider) value('$topwear','$bootomwear','$woolencloth','$lmsaid')");
    if ($query) {
    $msg="Laundry Services and prices Added.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
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

  <title>UNIMAS eLaundry</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
 <script type="text/javascript">
$(document).ready(function () {
$('#pickupaddress').hide();
$('#service').change(function () {
var v = $("#service").val();


if(v=='dropservice')
{
$('#pickupaddress').hide();
}

if(v=='pickupservice')
{
$('#pickupaddress').show();
}
});
});

</script>

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
          <li class="breadcrumb-item active">Add Prices</li>
        </ol>
 <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
        <!-- Icon Cards-->
        
        <!-- Area Chart Example-->
        
		<?php 
			$query=mysqli_query($con, "SELECT * FROM tblpricelist WHERE provider = '$lmsaid'");
			$ret=mysqli_fetch_array($query);
			if($ret==0){
		?>
        <!-- DataTables Example -->
        <form name="laundry" method="post" style="float: none; margin: auto; max-width: 768px;">
          <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="topwear" name="topwear" class="form-control" required="required" >
                  <label for="lastName">Wash Price (per kg/unit)</label>
                </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="bottomwear" name="bottomwear" class="form-control" required="required" >
              <label for="inputEmail">Iron Price (per kg/unit)</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="woolencloth" name="woolencloth" class="form-control" required="required"  >
                  <label for="inputPassword">Dry Wash Price (per kg/unit)</label>
                </div>
              </div>
              
            </div>
          </div>

         <p style="text-align: center; "><button type="submit" name="submit" class="btn btn-primary btn-block">Add</button></p>
        </form>
		<?php
			}
			else {
				echo ' You have already added your services.<br> Manage your Service prices <a href="manage-laundryprice.php">here</a>';
			}
		?>
		
      </div>
    </div>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 
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