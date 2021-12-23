<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");
    $query = "insert into production_employee values(null,'$_POST[pro_employee_name]','$_POST[pro_employee_email]','$_POST[pro_employee_password]','$_POST[pro_employee_department]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Registration successfully....You may login now.")
	window.location.href = "all_employee.php";
</script>