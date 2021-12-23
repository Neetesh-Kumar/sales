<?php
	session_start();
    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
		header('location:../index.php');
		exit();
	}
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");
    $sales_id = "";
    $sales_name="";
    $sales_email="";
    $sales_password="";

	$query = "select * from sales ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin pannel</title>
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

    <!-- Jquery table -->

</head>

<body style="background-color:#ecf0f4;">

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center">
                <a class="navbar-brand brand-logo" href="admin_dashboard.php">
                    <img src="images/logo.svg" alt="logo" class="logo-dark" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="admin_dashboard.php"><img src="images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
                <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Admin dashboard!</h5>
                <ul class="navbar-nav navbar-nav-right ml-auto">
                    <form class="search-form d-none d-md-block" action="#">
                        <i class="icon-magnifier"></i>
                        <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                    <!-- <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="icon-speech"></i>
                            <span class="count">7</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                            aria-labelledby="messageDropdown">
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
                        <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#"
                            data-toggle="dropdown" aria-expanded="false">
                            <div class="d-inline-flex mr-3">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <span class="profile-text font-weight-normal">English</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2"
                            aria-labelledby="LanguageDropdown">
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
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle ml-2" src="images/faces/face8.png" alt="Profile image">
                            <span class="font-weight-normal"><?php echo $_SESSION['name'];?> </span></a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="images/faces/face8.png" alt="Profile image">
                                <p class="mb-1 mt-3"><?php echo $_SESSION['name'];?></p>
                                <p class="font-weight-light text-muted mb-0"><?php echo $_SESSION['email'];?></p>
                            </div>
                            <a class="dropdown-item" href="view_profile.php"><i
                                    class="dropdown-item-icon icon-user text-primary"></i> My Profile <span
                                    class="badge badge-pill badge-danger">1</span></a>

                            <a class="dropdown-item" href="logout.php"><i
                                    class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
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
                                <p class="profile-name"><?php echo $_SESSION['name'];?></p>
                                <p class="designation">Administrator</p>
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
                        <a class="nav-link" href="admin_dashboard.php">
                            <span class="menu-title">Dashboard</span>
                            <i class="icon-screen-desktop menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-category"><span class="nav-link">Fields</span></li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basi" aria-expanded="false"
                            aria-controls="ui-basi">
                            <span class="menu-title">Leads</span>
                            <i class="icon-layers menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basi">
                            <ul class="nav sub-menu">
                                <li class="nav-item"> <a href="add_lead.php" class="nav-link">Add New Lead</a></li>
                                <li class="nav-item"> <a class="nav-link" href="all_leads.php">All Lead List</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- <li class="nav-item nav-category"><span class="nav-link">Invoices</span></li> -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title">Invoice</span>
                            <i class="icon-layers menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <!-- <li class="nav-item"> <a  href="add_invoice.php" class="nav-link" >Add New Invoice</a></li> -->
                                <li class="nav-item"> <a class="nav-link" href="all_invoice.php">All Invoice List</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="nav-item nav-category"><span class="nav-link">Orders</span></li> -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false"
                            aria-controls="ui-basic1">
                            <span class="menu-title">Orders</span>
                            <i class="icon-layers menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic1">
                            <ul class="nav flex-column sub-menu">
                                <!-- <li class="nav-item"> <a  href="add_order.php" class="nav-link" >Add New Order</a></li> -->
                                <li class="nav-item"> <a class="nav-link" href="all_order.php">All Orders List</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="nav-item nav-category"><span class="nav-link">Employee</span></li> -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                            aria-controls="ui-basic2">
                            <span class="menu-title">Employees</span>
                            <i class="icon-layers menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic2">
                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" href="all_employee.php">All Employees List</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="all_pro_employee.php">All Production
                                        Employees List</a></li>
                                <li class="nav-item"> <a class="nav-link" href="all_add_employee.php">CodingGate
                                        Employees List</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false"
                            aria-controls="ui-basic2">
                            <span class="menu-title">Task</span>
                            <i class="icon-layers menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic3">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="add_task.php">Add Task</a></li>
                                <li class="nav-item"> <a class="nav-link" href="all_task.php">All Task List</a></li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false"
                            aria-controls="ui-basic2">
                            <span class="menu-title">Attendance</span>
                            <i class="icon-layers menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic4">
                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" href="all_attendance.php">All
                                        AttendanceList</a></li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic6" aria-expanded="false"
                            aria-controls="ui-basic6">
                            <span class="menu-title">Target</span>
                            <i class="icon-layers menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic6">
                            <ul class="nav flex-column sub-menu">

                                <li class="nav-item"> <a class="nav-link" href="add_target.php">Add Target</a></li>
                                <li class="nav-item"> <a class="nav-link" href="show_target.php">Show Target</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="nav-item pro-upgrade">
              <span class="nav-link">
                <a class="btn btn-block px-0 btn-rounded btn-upgrade" href="https://www.bootstrapdash.com/product/stellar-admin-template/" target="_blank"> <i class="icon-badge mx-2"></i> Upgrade to Pro</a>
              </span>
            </li> -->
                </ul>
            </nav>
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row purchace-popup">
                        <div class="col-12 stretch-card grid-margin">

                        </div>
                    </div>


                    <div class="container pt-5">
                        <div class="row">
                            <div class="col-md-12 shadow p-4 mb-4 bg-white rounded">
                                <!-- <h1 class="pt-2">All Employee List</h1> -->

                                <button type="button" class="btn btn-dark float-right " data-toggle="modal"
                                    data-target="#exampleModal">Add Employee</button>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-dark text-white">
                                                <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
                                                <button type="button" class="close " data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true" style="color:white;">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body bg-white">
                                                <form action="create_account.php" method="post" class="fr">
                                                    <div class="form-group">

                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="Enter Your Name" required>
                                                    </div>
                                                    <div class="form-group">

                                                        <input type="text" name="email" class="form-control"
                                                            placeholder="Enter Your Email" required>
                                                    </div>
                                                    <div class="form-group">

                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="Enter Your Password" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" id="dept" name="dept">
                                                            <option value="">Select-Department</option>
                                                            <option value="s">Sales Department</option>
                                                            <option value="p">Production Department</option>

                                                        </select>
                                                    </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" name="login" class="btn btn-dark">Create
                                                    Account</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row pt-1">

                            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">


                                <table id="table_id" class="display table table-striped table-bordered text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                        	$query_run = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($query_run)){
                                $sales_id = $row['sales_id'];
                                $sales_name = $row['sales_name'];
                                $sales_email = $row['sales_email'];
                                $sales_password = $row['sales_password'];
                            
                        ?>
                                        <tr>
                                            <td><?php echo $sales_id;?></td>
                                            <td><?php echo $sales_name;?></td>
                                            <td><?php echo $sales_email;?></td>
                                            <td><?php echo $sales_password;?></td>
                                            <td>Sales</td>
                                            <td>
                                                <a href="edit_sales.php?sid=<?php echo $row['sales_id'];?>" class="edit"
                                                    title="Edit" style="text-decoration: none;color: blue;"><i
                                                        class="icon-pencil">&#xE254;</i></a>
                                                <a href="delete_editemployee.php?aid=<?php echo $row['sales_id'];?>"
                                                    class="delete" title="Delete" data-toggle="tooltip"
                                                    style="text-decoration: none;color: red;"><i
                                                        class="icon-trash">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <?php
                            }
                            ?>

                                        <?php
                            
                            $connection = mysqli_connect("localhost","root","");
                            $db = mysqli_select_db($connection,"crm");
                            $pro_id = "";
                            $pro_name="";
                            $pro_email="";
                            $pro_password="";

                            $query = "select * from production";

                            $query_run = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($query_run)){
                                $pro_id = $row['pro_id'];
                                $pro_name = $row['pro_name'];
                                $pro_email = $row['pro_email'];
                                $pro_password = $row['pro_password'];


                            ?>
                                        <tr>
                                            <td><?php echo $pro_id;?></td>
                                            <td><?php echo $pro_name;?></td>
                                            <td><?php echo $pro_email;?></td>
                                            <td><?php echo $pro_password;?></td>
                                            <td>Production</td>
                                            <td>
                                                <a href="edit-production.php?pid=<?php echo $row['pro_id'];?>"
                                                    class="edit" title="Edit" data-toggle="tooltip"
                                                    style="text-decoration: none;color: blue;" data-toggle="modal"
                                                    data-target="#editmodalsales"><i
                                                        class="icon-pencil">&#xE254;</i></a>
                                                <a href="delete_proemployee.php?aid=<?php echo $row['pro_id'];?>"
                                                    class="delete" title="Delete" data-toggle="tooltip"
                                                    style="text-decoration: none;color: red;"><i
                                                        class="icon-trash">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <?php
                            }
                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <div class="modal fade" id="editmodalsales" tabindex="-1" role="dialog" aria-labelledby="editmodalsales"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title" id="editmodalsales">Edit Account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color:white;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" class="fr">
                            <input type="hidden" name="sales_id" id="sales_id">

                            <div class="form-group">
                                <label for="Employee">Employee Name</label>
                                <input type="text" name="sales_name" id="sales_name" class="form-control"
                                    value="<?php echo $sales_name?>" required>
                            </div>
                            <div class="form-group">
                                <label for="Employee">Employee Email</label>
                                <input type="text" name="sales_email" id="sales_email" class="form-control"
                                    value="<?php echo $sales_email?>" required>
                            </div>
                            <div class="form-group">
                                <label for="Employee">Employee Password</label>
                                <input type="text" name="sales_password" id="sales_password" class="form-control"
                                    value="<?php echo $sales_password?>" required>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" id="update" class="btn btn-dark">Edit Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit sales POP UP Form close -->


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
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
        </script>



</body>

</html>