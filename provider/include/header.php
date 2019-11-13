 <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.php">UNIMAS eLaundry</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
   
      <div class="input-group">
       
       
      </div>
<?php
$lmsaid=$_SESSION['ldaid'];
$ret1=mysqli_query($con,"select tbluser.FullName,tbllaundryreq.ID from tbllaundryreq join tbluser on tbluser.id=tbllaundryreq.UserID where tbllaundryreq.provider= '$lmsaid' and tbllaundryreq.Status='0'");
$num=mysqli_num_rows($ret1);

?>   
<ul class="navbar-nav ml-auto ml-md-0">
      
   <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="badge badge-danger"><?php echo $num;?></span><i class="fas fa-bell fa-fw"></i>        
          
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">

          <?php if($num>0){
while($result=mysqli_fetch_array($ret1))
{
            ?>
          <a class="dropdown-item" href="view-newrequest.php?editid=<?php echo $result['ID'];?>">New Request Received from <?php echo $result['FullName'];?></a>
<?php }} else {?>

          <a class="dropdown-item" href="new-request.php">No New Requests Found</a>
        <?php } ?>
      </li>



      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <?php
$adid=$_SESSION['ldaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
          <a class="dropdown-item" href="admin-profile.php"><?php echo $name; ?></a>
          <a class="dropdown-item" href="admin-profile.php">View Profile</a>
          <a class="dropdown-item" href="changepassword.php">Change Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>