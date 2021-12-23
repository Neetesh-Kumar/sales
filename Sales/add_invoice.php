<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"crm");

?>

<?php
	// $query = "select * from invoice order by invoice_number desc limit 1";
	// $query_run = mysqli_query($connection,$query);
  // $row = mysqli_fetch_array($query_run);
	// $last_nmbr = $row['invoice_number'];
	// if($last_nmbr == "")
	// {
	// 	$invoice_number = "#L-1";
	// }
	// else{
	// 	$invoice_number = substr($last_nmbr,4);
	// 	$invoice_number = intval ($invoice_number);
	// 	$invoice_number = "#L-" . ($invoice_number + 1);
	// }
  $last_nmbr = '';
  $query = "select * from invoice order by invoice_number desc limit 1";
	
	$stmt = $connection->query($query);
    if(mysqli_num_rows($stmt) > 0) {
        if ($row = mysqli_fetch_assoc($stmt)) {
            $last_nmbr = $row['invoice_number'];
            $last_nmbr = substr($last_nmbr, 4, 8);//separating numeric part
            $last_nmbr = $last_nmbr + 1;//Incrementing numeric part
            $last_nmbr = "INV-" . sprintf('%04s', $last_nmbr);//concatenating incremented value
            $invoice_number = $last_nmbr;
        }
    } 
    else {
        $last_nmbr = "INV-0001";
        $invoice_number = $last_nmbr;
    }


  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sales pannel</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>      
    <!-- End layout styles -->
    <style>
      #hidden_div {
    display: none;
}
/*----------step-wizard------------*/
.d-flex{
	display: flex;
}
.justify-content-center{
	justify-content: center;
}
.align-items-center{
	align-items: center;
}

/*---------signup-step-------------*/
.bg-color{
	background-color: #333;
}
.signup-step-container{
	padding: 150px 0px;
	padding-bottom: 60px;
}




    .wizard .nav-tabs {
        position: relative;
        margin-bottom: 0;
        border-bottom-color: transparent;
    }

    .wizard > div.wizard-inner {
            position: relative;
    margin-bottom: 50px;
    text-align: center;
    }

.connecting-line {
  height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 59%;
    margin: 0 auto;
    left: 0;
    right: 99px;
    top: 15px;
    z-index: 1;
}
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 30px;
    height: 30px;
    line-height: 30px;
    display: inline-block;
    border-radius: 50%;
    background: #fff;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 16px;
    color: #0e214b;
    font-weight: 500;
    border: 1px solid #ddd;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
        background: #0db02b;
    color: #fff;
    border-color: #0db02b;
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}
.wizard .nav-tabs > li.active > a i{
	color: #0db02b;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: red;
    transition: 0.1s ease-in-out;
}



.wizard .nav-tabs > li a {
    width: 30px;
    height: 30px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
    background-color: transparent;
    position: relative;
    top: 0;
}
.wizard .nav-tabs > li a i{
	position: absolute;
    top: -15px;
    font-style: normal;
    font-weight: 400;
    white-space: nowrap;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 12px;
    font-weight: 700;
    color: #000;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 20px;
}


.wizard h3 {
    margin-top: 0;
}
.prev-step,
.next-step{
    font-size: 13px;
    padding: 8px 24px;
    border: none;
    border-radius: 4px;
    margin-top: 30px;
}
.next-step{
	background-color: #1bdbe0;
}
.skip-btn{
	background-color: #cec12d;
}
.step-head{
    font-size: 20px;
    text-align: center;
    font-weight: 500;
    margin-bottom: 20px;
}
.term-check{
	font-size: 14px;
	font-weight: 400;
}
.custom-file {
    position: relative;
    display: inline-block;
    width: 100%;
    height: 40px;
    margin-bottom: 0;
}
.custom-file-input {
    position: relative;
    z-index: 2;
    width: 100%;
    height: 40px;
    margin: 0;
    opacity: 0;
}
.custom-file-label {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1;
    height: 40px;
    padding: .375rem .75rem;
    font-weight: 400;
    line-height: 2;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}
.custom-file-label::after {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 3;
    display: block;
    height: 38px;
    padding: .375rem .75rem;
    line-height: 2;
    color: #495057;
    content: "Browse";
    background-color: #e9ecef;
    border-left: inherit;
    border-radius: 0 .25rem .25rem 0;
}
.footer-link{
	margin-top: 30px;
}
.all-info-container{

}
.list-content{
	margin-bottom: 10px;
}
.list-content a{
	padding: 10px 15px;
    width: 100%;
    display: inline-block;
    background-color: #f5f5f5;
    position: relative;
    color: #565656;
    font-weight: 400;
    border-radius: 4px;
}
.list-content a[aria-expanded="true"] i{
	transform: rotate(180deg);
}
.list-content a i{
	text-align: right;
    position: absolute;
    top: 15px;
    right: 10px;
    transition: 0.5s;
}
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #fdfdfd;
}
.list-box{
	padding: 10px;
}
.signup-logo-header .logo_area{
	width: 200px;
}
.signup-logo-header .nav > li{
	padding: 0;
}
.signup-logo-header .header-flex{
	display: flex;
	justify-content: center;
	align-items: center;
}
.list-inline li{
    display: inline-block;
}
.pull-right{
    float: right;
}
/*-----------custom-checkbox-----------*/
/*----------Custom-Checkbox---------*/
input[type="checkbox"]{
    position: relative;
    display: inline-block;
    margin-right: 5px;
}
input[type="checkbox"]::before,
input[type="checkbox"]::after {
    position: absolute;
    content: "";
    display: inline-block;   
}
input[type="checkbox"]::before{
    height: 16px;
    width: 16px;
    border: 1px solid #999;
    left: 0px;
    top: 0px;
    background-color: #fff;
    border-radius: 2px;
}
input[type="checkbox"]::after{
    height: 5px;
    width: 9px;
    left: 4px;
    top: 4px;
}
input[type="checkbox"]:checked::after{
    content: "";
    border-left: 1px solid #fff;
    border-bottom: 1px solid #fff;
    transform: rotate(-45deg);
}
input[type="checkbox"]:checked::before{
    background-color: #18ba60;
    border-color: #18ba60;
}






@media (max-width: 767px){
	.sign-content h3{
		font-size: 40px;
	}
	.wizard .nav-tabs > li a i{
		display: none;
	}
	.signup-logo-header .navbar-toggle{
		margin: 0;
		margin-top: 8px;
	}
	.signup-logo-header .logo_area{
		margin-top: 0;
	}
	.signup-logo-header .header-flex{
		display: block;
	}
}

    </style>
  </head>
  <body>


    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="sales_dashboard.php">
            <img src="images/logo.svg" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="sales_dashboard.php"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Sales dashboard!</h5>
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
                <img class="img-xs rounded-circle ml-2" src="images/faces/face8.png" alt="Profile image"> <span class="font-weight-normal"><?php echo $_SESSION['sales_name'];?> </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="images/faces/face8.png" alt="Profile image">
                  <p class="mb-1 mt-3"><?php echo $_SESSION['sales_name'];?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $_SESSION['sales_email'];?></p>
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
                  <p class="profile-name"><?php echo $_SESSION['sales_name'];?></p>
                  <p class="designation">Sales Manager</p>
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
              <a class="nav-link" href="sales_dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">Fields</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basi" aria-expanded="false" aria-controls="ui-basi">
                <span class="menu-title">Leads</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basi">
                <ul class="nav sub-menu">
                <li class="nav-item"> <a  href="add_lead.php" class="nav-link" >Add New Lead</a></li>
                  <li class="nav-item"> <a class="nav-link" href="all_leads.php">All Lead List</a></li>
                </ul>
              </div>
            </li>
            
            <!-- <li class="nav-item nav-category"><span class="nav-link">Invoices</span></li> -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Invoice</span>
                <i class="icon-layers menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a  href="add_invoice.php" class="nav-link" >Add New Invoice</a></li>
                  <li class="nav-item"> <a class="nav-link" href="all_invoice.php">All Invoice List</a></li>
                </ul>
              </div>
            </li>
            <!-- <li class="nav-item nav-category"><span class="nav-link">Orders</span></li> -->
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
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
           
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">
               
              </div>
            </div>
            
            <!-- <div class="container">
            <div class="row">

              <div class="col-md-3"></div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Invoice</h4>
                    <p class="card-description"> Add Invoice </p>
                    <form action="create_invoice.php" id="isert-data" method="post" class="fr">
          <div class="form-group">
            <label for="text">Invoice Number</label>
              <input type="text" name="invoice_number" class="form-control" id="invoice_number" value="<?php echo $invoice_number; ?>" readonly>
          </div>
            <div class="form-group">
            <label for="text">Lead Number</label>
			
                <select class="form-control required" name="lead_number" id="lead_number" required>
						<option >-Select Lead ID-</option>
						<?php
							$connection = mysqli_connect("localhost","root","");
							$db = mysqli_select_db($connection,"crm");
							$query = "select lead_number from lead";
							$query_run = mysqli_query($connection,$query);
							while($row = mysqli_fetch_assoc($query_run)){
								?>
								<option required><?php echo $row['lead_number'];?></option>
								<?php
							}
						?>
					</select>
			</div>

      <div class="form-group">
      <label for="text">Amount</label>
          <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text input-group-addon currency-symbol">$</span>
          </div>
              <input type="text" name="invoice_amount" class="form-control currency-amount input-group-addon currency-symbol" aria-label="Amount (to the nearest dollar)" id="inlineFormInputGroup" placeholder="0.00" size="8" required>
          <div class="input-group-append">
              <span class="input-group-text input-group-addon currency-addon" style="height: 46px;">
                  <select class="currency-selector" style="" id="ddlselect">
                      <option value="1" data-symbol="$" data-placeholder="0.00" selected>USD</option>
                      <option value="2" data-symbol="€" data-placeholder="0.00">EUR</option>
                      <option value="3" data-symbol="£" data-placeholder="0.00">GBP</option>
                      <option value="3" data-symbol="Rs." data-placeholder="0.00">PKR</option>

                    </select>
              </span>
          </div>
          </div>
          </div>

         
            <div class="form-group">
            <label for="text">Status</label>
          <select id="myselect" class="form-control currency-list" name="invoice_status" value="pay-now" onclick="pay_now();">
          <option >Choose Option</option>
            <option  value="1">Paid</option>
            <option value="0" >Un Paid</option>
				</select>
            </div>
      </div>
      <div class="modal-footer">
      <button type="submit" name="login" class="btn btn-primary mr-2">Create Invoice</button>
		</form>
                
            </div>
              </div>
                <div class="col-md-3"></div>
        
        </div>
         -->
         <section class="signup-step-container bg-light">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i>Step 1</i></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Step 2</i></a>
                                </li>

                            </ul>
                        </div>
        
<form role="form" action="create_invoice.php" class="login-box" method="post" enctype="multipart/form-data">
  <div class="tab-content" id="main_form">
      <div class="tab-pane active" role="tabpanel" id="step1">
          <h4 class="text-center">Step 1</h4>
          <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                <label for="text">Invoice Number</label>
                  <input type="text" name="invoice_number" class="form-control" id="invoice_number" value="<?php echo $invoice_number; ?>"  style="background-color:#e9ecef;" readonly>
              </div>
              </div>
              <div class="col-md-12">
              <div class="form-group">
            <label for="text">Lead Number</label>
			
                <select class="form-control required" name="lead_number" id="lead_number" required>
						<option >-Select Lead ID-</option>
						<?php
							$connection = mysqli_connect("localhost","root","");
							$db = mysqli_select_db($connection,"crm");
							$query = "select lead_number from lead";
							$query_run = mysqli_query($connection,$query);
							while($row = mysqli_fetch_assoc($query_run)){
								?>
								<option required><?php echo $row['lead_number'];?></option>
								<?php
							}
						?>
					</select>
			</div>

      </div>
      <div class="col-md-12">

      <div class="form-group">
      <label for="text">Amount</label>
          <div class="input-group mb-3">
          <div class="input-group-prepend">
              <span class="input-group-text input-group-addon currency-symbol">$</span>
          </div>
              <input type="text" name="invoice_amount" class="form-control currency-amount input-group-addon currency-symbol" aria-label="Amount (to the nearest dollar)" id="inlineFormInputGroup" placeholder="0.00" size="8" required>
          <div class="input-group-append">
              <span class="input-group-text input-group-addon currency-addon" style="height: 46px;">
                  <select class="currency-selector" style="" id="ddlselect">
                      <option value="1" data-symbol="$" data-placeholder="0.00" selected>USD</option>
                      <option value="2" data-symbol="€" data-placeholder="0.00">EUR</option>
                      <option value="3" data-symbol="£" data-placeholder="0.00">GBP</option>
                      <option value="3" data-symbol="Rs." data-placeholder="0.00">PKR</option>

                    </select>
              </span>
          </div>
          </div>
          </div>
          </div>  
              </div>
              <ul class="list-inline pull-right">
                  <li><button type="button" class="default-btn next-step text-white">Continue to next step</button></li>
              </ul>
          </div>
          <div class="tab-pane" role="tabpanel" id="step2">
              <h4 class="text-center">Step 2</h4>
              <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                      <label for="text">Status</label>
                    <select id="myselect" class="form-control currency-list" name="invoice_status" onchange="showDiv('hidden_div', this)">
                    <option  >choose option</option>
                      <option  value="1">Paid</option>
                      <option value="0" >unpaid</option>
                     
                  </select>
                      </div>
              </div>
 
              <div id="hidden_div">

             
              <div class="col-md-12">
              <div class="form-group">
              <label for="Employee">Attachment File</label>
            <input type="file" name="proof_pdf" id="proof_pdf" class="form-control">
          </div>
          </div>
          <div class="col-md-12">
          <div class="form-group" >
          <label for="exampleFormControlTextarea1">Discription</label>
            <textarea class="form-control" id="discription" name="discription_invoice" rows="4" cols="100" ></textarea>
          </div>
          </div>
          </div>
          </div>
          <ul class="list-inline pull-right">
              <li><button type="button" class="default-btn prev-step">Back</button></li>
              <li><button type="submit" class="btn btn-primary" name="login" >Create Invoice</button></li>
          </ul>
      </div>

      <div class="clearfix"></div>
  </div>
                            
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
  
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->



    <!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="exampleModalLabel">Proof Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="create_invoice_proof.php" method="post" id="myForm" enctype="multipart/form-data">
        <input type="hidden" name="sales_id" id="sales_id">
        
            <div class="form-group">
					<label for="Employee">Attachment File</label>
				<input type="file" name="proof_pdf" id="proof_pdf" class="form-control"  required>
			</div>

      <div class="form-group">
    <label for="exampleFormControlTextarea1">Discription</label>
    <textarea class="form-control" id="discription" name="discription_invoice" id="exampleFormControlTextarea1" rows="5"></textarea>
  </div>
            
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="paid" id="paid" class="btn btn-dark" >Paid</button>
		</form>
      </div>
    </div>
  </div>
</div>
</div> -->

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

     <!-- jquery table link close -->
     <script>
     function updateSymbol(e){
  var selected = $(".currency-selector option:selected");
  $(".currency-symbol").text(selected.data("symbol"))
  $(".currency-amount").prop("placeholder", selected.data("placeholder"))
  $('.currency-addon-fixed').text(selected.text())
}

$(".currency-selector").on("change", updateSymbol)

updateSymbol()
     </script>

     <script>
       $(function(){
         $("#ddlselect").change(function(){
           var displaysymbol=$("#ddlselect option:selected").text();
           $("#inlineFormInputGroup").val(displaysymbol);
         })
       })
     </script>
<script> 
$('#myselect').change(function() {
    var opval = $(this).val();
    if(opval=="1"){
        $('#exampleModal').modal("show");
        e.preventDefault();
    }
}); </script>
<!-- <script> 
$('#myselect').change(function(e) {
    var opval = $(this).val();
    if(opval=="1"){
        $('#exampleModal').modal("show");
        
    }
   
}); </script> -->

<!-- 
<script>



$("#myForm").on("submit", function (event) {
    event.preventDefault();
    if($('#proof_pdf').val()=="")
    {
      alert("File Is require");
    }else if($('#discription').val()==''){
      alert("Discription require");
    }
    else{
      $.ajax({
        url:"create_invoice_proof.php",
        method:"POST"
        data:$('#myForm').serialize(),
        success:function(data)
        {
          $('#myForm')[0].reset();
          $('#exampleModal').modal('hide');
          $('#insert-data').html(data);
        }
      }); 
    }
});
</script> -->
<script>
  // ------------step-wizard-------------
$(document).ready(function () {
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
});



</script>
<script>
  function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
}
</script>


  </body>
</html>

