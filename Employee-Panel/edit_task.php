<?php
session_start();

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"crm");
$task_id = "";
$task_number="";
$task="";
$project = "";
$dua_date="";
$status="";
$pdf_task="";
$discription_task="";
$query = "select * from add_task  where task_id = $_GET[oid]";
    $query_run = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){
        $task_id = $row['task_id'];
        $task_number = $row['task_number'];
        $task = $row['task'];
        $project = $row['project'];
        $dua_date = $row['dua_date'];
        $status = $row['status'];
        $pdf_task = $row['pdf_task'];
        $discription_task = $row['discription_task'];
        
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Employee pannel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
    <style>
            #hidden_div {
    display: none;
}
    </style>
    
  </head>
  <body style="background-color:#ecf0f4;">
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="employe_employee_dashboard.php">
            <img src="images/logo.svg" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="employe_dashboard.php"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome  Employee dashboard!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" class="form-control" placeholder="Search Here" title="Search here">
            </form>
            <!-- <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li> -->
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-speech"></i>
                <span class="count">7</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">
              <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="d-inline-flex mr-3">
                  <i class="flag-icon flag-icon-us"></i>
                </div>
                <span class="profile-text font-weight-normal">English</span>
              </a>
              <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-us"></i> English </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-fr"></i> French </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-ae"></i> Arabic </a>
                <a class="dropdown-item">
                  <i class="flag-icon flag-icon-ru"></i> Russian </a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="images/faces/face8.jpg" alt="Profile image"> <span class="font-weight-normal"><?php echo $_SESSION['employe_name'];?> </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3"><?php echo $_SESSION['employe_name'];?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $_SESSION['employe_email'];?></p>
                </div>
                <a class="dropdown-item" href="view_profile.php"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
               
                <a class="dropdown-item" href="logout.php"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION['employe_name'];?></p>
                  <p class="designation"><?php echo $_SESSION['employe_designation'];?></p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="employe_dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Fields</span></li>
        
            
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Task</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item"> <a class="nav-link" href="all_task.php">All Task List</a></li>
                </ul>
              </div>
            </li>
            <!-- <li class="nav-item nav-category"><span class="nav-link">Orders</span></li> -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Attendance</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                
                  <li class="nav-item"> <a class="nav-link" href="all_attendance.php">All Attendance List</a></li>
                </ul>
              </div>
            </li>


          </ul>
        </nav>
         <!-- partial -->
         <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">
               
              </div>
            </div>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Proof Invoice</h4>
                    <p class="card-description"> Edit Order Data </p>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <!-- <div class="form-group">
                        <label for="exampleInputUsername1">Order Number</label>
                        <input type="text" name="order_number" class="form-control" value="<?php echo $order_number;?>"  readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Lead Number</label>
                        <input type="text" name="lead_number" class="form-control" value="<?php echo $lead_number;?>"  readonly>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Order Number</label>
                        <input type="text" name="invoice_number" class="form-control" value="<?php echo $invoice_number;?>"  readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Sales Person</label>
                        <input type="text" name="sales_person" class="form-control" value="<?php echo $sales_person;?>" readonly >
                      </div>
                       
                      <div class="form-group">
                        <label for="text">Course Name</label>
                        <input type="text" name="course_name" class="form-control" value="<?php echo $course_name;?>" readonly>
                      </div> -->
                      <div class="form-group">
                        <label for="text">Status</label>
                        <select class="form-control" name="status" value="<?php echo $status;?>" onchange="showDiv('hidden_div', this)" required>
						           
                        <option value="0">Incomplete</option>
                        <option value="1">Completed</option>
                        <option value="2">Progress</option>
				        </select>
                      </div>
                      <div id="hidden_div">
            <div class="form-group">
					<label for="Employee">Attachment File</label>
				<input type="file" name="pdf_task" id="pdf_task" class="form-control" value="<?php echo $pdf_task; ?>" required >
			</div>

      <div class="form-group">
    <label for="exampleFormControlTextarea1">Discription</label>
    <textarea class="form-control" id="discription" name="discription_task" id="exampleFormControlTextarea1" value="<?php echo $discription_task; ?>" rows="5" required></textarea>
  </div>
</div>
                      <!-- <div class="form-group">
                        <label for="text">Link</label>
                        <input type="url" name="link" class="form-control" value="<?php echo $link;?>" readonly>
                      </div>
                      <div class="form-group">
                        <label for="text">Start Date</label>
                        <input type="date" name="sale_startdate" class="form-control" value="<?php echo $sale_startdate;?>"readonly >
                      </div>
                      <div class="form-group">
                        <label for="text">Delivery Date</label>
                        <input type="date" name="sale_enddate" class="form-control" value="<?php echo $sale_enddate;?>" readonly >
                      </div> -->
                      <button type="submit" name="update" class="btn btn-primary mr-2" href="all_order.php">Update</button>
                   
                    </form>
                  </div>
                </div>
              </div>
                <div class="col-md-3"></div>
        
        </div>
         
    
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->



     <!-- jquery table link code -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
    $('#table_id').DataTable();
} );
    </script>
     <!-- jquery table link close -->

     <script>
  function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
}

</script>
  </body>
</html>
<?php
	if(isset($_POST['update'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"crm");
    move_uploaded_file($_FILES["pdf_task"]["tmp_name"],"pdf_task/" . $_FILES["pdf_task"]["name"]);
	$file="pdf_task/".$_FILES["pdf_task"]["name"];
		$query = "update add_task set status = '$_POST[status]',pdf_task='$file',discription_task='$_POST[discription_task]' where task_id = $_GET[oid]";
		$query_run = mysqli_query($connection,$query);
		// header("location:all_employee.php");
    echo "<script>location.href='all_task.php'</script>";
	}
?>