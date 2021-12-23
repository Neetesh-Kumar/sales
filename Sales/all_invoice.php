<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"crm");
// $invoice_id = "";
// $invoice_status="";
// $proof_pdf="";
// $discription_invoice="";
// $query = "select * from invoice where invoice_id = $_GET[tid]";
//     $query_run = mysqli_query($connection,$query);
//     while($row = mysqli_fetch_assoc($query_run)){
//         $invoice_id = $row['invoice_id'];
//         $invoice_status = $row['invoice_status'];
//         $proof_pdf = $row['proof_pdf'];
//         $discription_invoice = $row['discription_invoice'];
//     }

?>

<?php
	$query = "select * from invoice order by invoice_number desc limit 1";
	$query_run = mysqli_query($connection,$query);
  $row = mysqli_fetch_array($query_run);
	$last_nmbr = $row['invoice_number'];
	if($last_nmbr == "")
	{
		$invoice_number = "#L-1";
	}
	else{
		$invoice_number = substr($last_nmbr,3);
		$invoice_number = intval ($invoice_number);
		$invoice_number = "#L-" . ($invoice_number + 1);
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
    <!-- End layout styles -->
    <style>
            #hidden_div {
    display: none;
}
#hide{
  display:none;
}
      </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="sales-dashboard.php">
            <img src="images/logo.svg" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="sales-dashboard.php"><img src="images/logo-mini.svg" alt="logo" /></a>
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
                  <li class="nav-item"> <a class="nav-link" href="all_leads.php">All Leads List</a></li>
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
                  <li class="nav-item"> <a href="all_invoice.php" class="nav-link" href="#">All Invoice List</a></li>
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
            
            <div class="container-fluid">
            <div class="row">
        <div class="col-md-12 shadow p-4 mb-4 bg-white rounded">
            <!-- <h1 class="pt-2">All Employee List</h1> -->
      
            <button type="button" class="btn btn-dark float-right "><a href="add_invoice.php" style="color:white; text-decoration:none">Add New Invoice</a></button>
</div>

   
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-md-12 shadow p-3 mb-5 bg-white rounded">
            <table id="table_id" class="display table table-bordered  text-center">
                    <thead class="thead-dark">
                         <tr>
                            <th>ID</th>
                            <th>Invoice Number</th>
                            <th>Lead Number</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>File</th>
                            <th>Discription</th>
                            <th>Order</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                        <?php
                        $connection = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($connection,"crm");
                        $invoice_id = "";
                        $invoice_number = "";
                        $lead_number="";
                        $invoice_amount="";
                        $invoice_status="";
                        $proof_pdf="";
                        $discription_invoice="";
                        // $query = "select * from invoice WHERE `invoice_status` = 1 ";
                        $query = "select * from invoice  ";
                        	$query_run = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($query_run)){
                                $invoice_id = $row['invoice_id'];
                                $invoice_number = $row['invoice_number'];
                                $lead_number = $row['lead_number'];
                                $invoice_amount = $row['invoice_amount'];
                                $invoice_status = $row['invoice_status'];
                                $proof_pdf = $row['proof_pdf'];
                                $discription_invoice = $row['discription_invoice'];
                                
                            
                        ?>
                        <tr>
                            <td><?php echo $invoice_id;?></td>
                            <td><?php echo $invoice_number;?></td>
                            <td><?php echo $lead_number;?></td>
                            <td><?php echo $invoice_amount;?></td>
                           
                            <td onchange="showDiv('hidden_div', this)">
                           
                            <?php
                              if($invoice_status==1){
                                echo'<P><button class="btn btn-success" width: 131px;>Paid</button><P>';
                              }else{
                                echo'<P><button class="btn btn-danger" width: 131px;>UnPaid</button><P>';
                              }
                           ?>  
                           
                           </td>
                           <div id="hidden_div">
                           <?php
                                if($invoice_status == 1){
                                  echo "<td>".$proof_pdf."</td>";
                                }
                                else{
                                  echo "<td></td>";
                                }
                              ?>
                           <td><?php echo $discription_invoice;?></td>
                          
                            
                              <?php
                                if($invoice_status == 1){
                                  echo "<td><button  class='btn btn-dark'><a href='add_order.php?eid=".$invoice_id."' style='color:white; text-decoration:none;'>Create Order</a></button></td>";
                                }
                                else{
                                  echo "<td></td>";
                                }
                              ?>
                          
                            </div>
                            <td>
                            <a href="edit_invoice_status.php?tid=<?php echo $row['invoice_id'];?>" class="edit" title="Edit"  style="text-decoration: none;color: blue;" ><i class="icon-pencil">&#xE254;</i></a>
                            <a href="edit_invoice.php?iid=<?php echo $row['invoice_id'];?>" class="info" title="Info"  style="text-decoration: none;color: blue;" ><i class="icon-info">&#xE254;</i></a>
                            <!-- <a href="delete_invoice.php?aid=<?php echo $row['invoice_id'];?>" class="delete" title="Delete" data-toggle="tooltip" style="text-decoration: none;color: red;"><i class="icon-trash">&#xE872;</i></a> -->
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
     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="exampleModalLabel">Proof Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
                        $connection = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($connection,"crm");
                        $invoice_id = "";
                        $invoice_number = "";
                        $lead_number="";
                        $invoice_amount="";
                        $invoice_status="";
                        $proof_pdf="";
                        $discription_invoice="";
                        $query = "select * from invoice where invoice_id = $_GET[tid]";
                        	$query_run = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($query_run)){
                                $invoice_id = $row['invoice_id'];
                                $invoice_number = $row['invoice_number'];
                                $lead_number = $row['lead_number'];
                                $invoice_amount = $row['invoice_amount'];
                                $invoice_status = $row['invoice_status'];
                                $proof_pdf = $row['proof_pdf'];
                                $discription_invoice = $row['discription_invoice'];
                                
                            
                        ?>
      <form action="" method="post" id="myForm" enctype="multipart/form-data">
        <input type="hidden" name="sales_id" id="sales_id">
        <div class="form-group">
                      <label for="text">Status</label>
                    <select id="myselect" class="form-control currency-list" name="invoice_status"  value="<?php echo $invoice_status; ?>" onchange="showDiv('hidden_div', this)">
                    <option default>choose option</option>
                      <option  value="1">Paid</option>
                      <option default>unpaid</option>
                     
                  </select>
                      </div>
        <div id="hidden_div">
            <div class="form-group">
					<label for="Employee">Attachment File</label>
				<input type="file" name="proof_pdf" id="proof_pdf" class="form-control" value="<?php echo $proof_pdf; ?>"  required>
			</div>

      <div class="form-group">
    <label for="exampleFormControlTextarea1">Discription</label>
    <textarea class="form-control" id="discription" name="discription_invoice" id="exampleFormControlTextarea1" value="<?php echo $discription_invoice; ?>" rows="5"></textarea>
  </div>
  </div>    
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" name="update" id="update" class="btn btn-dark" >Paid</button>
		</form>
 <?php } ?>
      </div>
    </div>
  </div>
</div>
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



     <!-- jquery table link code -->
     <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
    $('#table_id').DataTable();
    $('.blue').css("color", "blue");
 $('.red').css("color", "red");
 $('.green').css("color", "green");
   
} );
    </script>
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
  function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
}

</script>
<!-- <script>
$(function(c) {

$('#status_to_show').on('keyup change', function(c) {
var one = $('#status_to_show');
if( (one.val() == 1) || (one.val() == 1) ) {
        $('#hide').show();
    } else  {
        $('#hide').hide();
    }
}); 
})

</script> -->
  </body>
</html>
<?php
	if(isset($_POST['update'])){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"crm");
		$query = "update invoice set invoice_status = '$_POST[invoice_status]',proof_pdf = '$_POST[proof_pdf]',discription_invoice='$_POST[discription_invoice]' where invoice_id = $_GET[tid]";
		$query_run = mysqli_query($connection,$query);
		// header("location:all_employee.php");
    echo "<script>location.href='all_invoice.php'</script>";
	}
?>