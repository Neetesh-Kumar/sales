<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");
    $query = "insert into all_employee_data values(null,'$_POST[employee_number]','$_POST[employe_name]','$_POST[employe_email]','$_POST[employe_password]','$_POST[employe_designation]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Successfully Create Employee Account.....")
	window.location.href = "all_add_employee.php";
</script>