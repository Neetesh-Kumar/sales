<?php
session_start();

$connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"crm");
    $order_number="";
    $pro_employee_name="";
    $date_time="";
    $comment_order="";
    $query = "select * from comment_order where order_number = '$_GET[cid]'";
    $query_run = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){        
        $order_number = $row['order_number'];
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Production pannel</title>
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
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="production_dashboard.php">
            <img src="images/logo.svg" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="production_dashboard.php"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Production dashboard!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <form class="search-form d-none d-md-block" action="#">
              <i class="icon-magnifier"></i>
              <input type="search" class="form-control" name="search" id="searchbar" onkeyup="search_animal()" type="text" placeholder="Search Here" title="Search here">
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
                <img class="img-xs rounded-circle ml-2" src="images/faces/face8.png" alt="Profile image"> <span class="font-weight-normal"><?php echo $_SESSION['pro_name'];?> </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="images/faces/face8.png" alt="Profile image">
                  <p class="mb-1 mt-3"><?php echo $_SESSION['pro_name'];?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $_SESSION['pro_email'];?></p>
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
                  <img class="img-xs rounded-circle" src="images/faces/face8.png" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION['pro_name'];?></p>
                  <p class="designation">Production Mangaer</p>
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
              <a class="nav-link" href="production_dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Fields</span></li>
        
            
           
            <!-- <li class="nav-item nav-category"><span class="nav-link">Orders</span></li> -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Orders</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic1">
                <ul class="nav flex-column sub-menu">
                  
                  <li class="nav-item"> <a class="nav-link" href="all_order.php">All Orders List</a></li>
                </ul>
              </div>
            </li>
            <!-- <li class="nav-item nav-category"><span class="nav-link">Employee</span></li> -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                <span class="menu-title">Employees</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                  
                  <li class="nav-item"> <a class="nav-link" href="all_employee.php">All Employees List</a></li>
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
              <div class="col-md-1"></div>
              <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Order Comments</h1>
                    <div class="row pt-4">
                       
                    <div class="col-md-3">
                <h1 style="font-size:20px;">TIME</h1>
                <?php   
                $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run)){       
                        $date_time = $row['date_time'];
                        ?>       
                    
                    <input type="text" class=" form-control m-2" name="date_time" value="<?php echo $date_time;?>" readonly>
                        <?php          
                    }
                ?>  
                </div>
    <div class="col-md-2">
    <h1 style="font-size:20px;">Emp-Name</h1>
    <?php   
    $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){        
            $pro_employee_name = $row['pro_employee_name'];
            ?>      
        <!-- <p><?php echo $pro_employee_name;?></p> -->
        <input type="text" class=" form-control m-2" name="pro_employee_name" value="<?php echo $pro_employee_name;?>" readonly>
            <?php           
        }
    ?>    
     </div>
     <div class="col-md-3">
    
    <h1 style="font-size:20px;">All Comment</h1>
    <?php                  
    $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){                         
            $comment_order = $row['comment_order'];
            ?>                       
        <!-- <p><?php echo $comment_order;?></p> -->
        <input type="text" class=" form-control m-2" name="comment_order" value="<?php echo $comment_order;?>" readonly>
            <?php                          
        }
    ?>
     </div>
     <div class="col-md-4">
    <h1 style="font-size:20px;">File</h1>
    <?php   
    $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){        
            $comment_pdf = $row['comment_pdf'];
            ?> 
            <div class="row mt-2">
              <div class="col-md-6">

                <a href="../Production-Employee/<?php echo $comment_pdf;?>" target="blank"><button class="form-control btn-sm btn btn-outline-dark" > View</button> </a>
              </div>
              <div class="col-md-6">

                <a href="comment.php?oid=<?php echo $row['order_number'];?>"><button class=" form-control btn-sm btn btn-primary">Add Comment</button></a>
              </div>
            </div>     
            <?php           
        }
    ?>    
     
     </div>
     <!-- <div class="col-md-2">
     <a href="comment.php"><button class="btn btn-danger">Add Comment</button></a>
     </div> -->
     <a href="all_order.php"><button class="btn btn-danger">Back</button></a>
     <a href="sales_comment.php?on=<?php echo $order_number;?>"><button class="btn btn-outline-primary ml-5">View Sales Comment</button></a>
    
    </div>

                  </div>
                </div>
              </div>
                <div class="col-md-1"></div>
        
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
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


    <!--  -->
  </body>
</html>

