<?php
session_start();
error_reporting(0);
include('include/dbconnection.php');
if (strlen($_SESSION['lduid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $lmsuid=$_SESSION['lduid'];
    $dol=$_POST['date'];
	$dol1=$_POST['date1'];
    $topwear=$_POST['topwear'];
    $bootomwear=$_POST['bottomwear'];
    $woolencloth=$_POST['woolencloth'];
     $others=$_POST['others'];
     $service=$_POST['service'];
     $pkadd=$_POST['address'];
     $contperson=$_POST['contactperson'];
     $dec=$_POST['description'];
	 $provider = $_POST['provider'];
     $status=0;
    $query=mysqli_query($con, "insert into  tbllaundryreq(UserID,DateofLaundry,deldate,TopWear,BootomWear,WoolenCloth,Other,Service,PickupAddress,ContactPerson,Description,Status,provider) value
	('$lmsuid','$dol','$dol1','$topwear','$bootomwear','$woolencloth','$others','$service','$pkadd','$contperson','$dec','$status','$provider')");
    if ($query) {
    $msg="Laundry request has been sent.";
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

  <title>LMS</title>

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
          <li class="breadcrumb-item active">Overview</li>
        </ol>
 <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
        <!-- Icon Cards-->
        
        <!-- Area Chart Example-->
        

        <!-- DataTables Example -->
        <form name="laundry" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" id="date" name="date" class="form-control"  required="required" autofocus="autofocus">
                  <label for="date">Pick up / Drop Date </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" id="date" name="date1" class="form-control" required="required" autofocus="autofocus">
                  <label for="lastName">Delivery Date</label>
                </div>
              </div>
            </div>
          </div>
		  
		  <div class="form-group">
			<div class="form-label-group">
                <input type="text" id="topwear" name="topwear" class="form-control" required="required" >
                <label for="lastName">Wash (in kg/unit)</label>
            </div>
		  </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="bottomwear" name="bottomwear" class="form-control" required="required" >
              <label for="inputEmail">Iron (in kg/unit)</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="woolencloth" name="woolencloth" class="form-control" required="required"  >
                  <label for="inputPassword">Dry Wash (in kg/unit)</label>
                </div>
              </div>
              
            </div>
          </div>
<div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="others" name="others" class="form-control">
                  <label for="inputPassword">Others</label>
                </div>
              </div>
              
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">

<select id="provider" name="provider" class="form-control">
  <option value="">Select a provider</option>
  <?php
    $ret=mysqli_query($con,"select * from tbladmin");
	$cnt=1;
	while ($row=mysqli_fetch_array($ret)) {
  ?>
 <option value="<?php echo $row['ID']; ?>"><?php echo $row['AdminName']; ?></option> 
	<?php } ?>
</select>
<br>
                </div>
              </div>
              
            </div>
          </div>

          <div class="form-group" >
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="address" name="address" class="form-control"  >
                  <label for="inputPassword">Pickup Address</label>
                </div>
              </div>
              
            </div>
          </div>

<div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="contactperson" name="contactperson" class="form-control"  required="required">
                  <label for="inputPassword">Contact Person</label>
                </div>
              </div>
              
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="description" name="description" class="form-control">
                  <label for="inputPassword">Description(if any)</label>
                </div>
              </div>
              
            </div>
          </div>
         <p style="text-align: center; "><button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button></p>
        </form>

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