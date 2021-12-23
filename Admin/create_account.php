<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");


  $value = filter_input(INPUT_POST, 'dept', FILTER_SANITIZE_STRING);
  if(!empty($_POST['dept'])){
    if($value=="s"){

      $query = "insert into sales values(null,'$_POST[name]','$_POST[email]','$_POST[password]')";
    }else{

      $query = "insert into production values(null,'$_POST[name]','$_POST[email]','$_POST[password]')";
    }
  }
  
	


	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("create account successfully.....")
	window.location.href = "all_employee.php";
</script>


