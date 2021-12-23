<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");

	$query = "insert into send_task values(null,'$_POST[send_employee_id]','$_POST[task_id]')";
	$query_run = mysqli_query($connection,$query);
?>
<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");
	$query = "update add_task set assign_to = '$_POST[send_employee_id]' where task_id = '$_POST[task_id]'" ;
	$query_run = mysqli_query($connection,$query);	
?>
<script type="text/javascript">
	alert("Task successfully Send .....")
	window.location.href = "all_task.php";
</script>