<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");

	$query = "insert into send_order values(null,'$_POST[send_employee_id]','$_POST[order_id]')";
	$query_run = mysqli_query($connection,$query);	
?>
<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");
	$query = "update sales_order set assign_to = '$_POST[send_employee_id]' where order_id = '$_POST[order_id]'" ;
	$query_run = mysqli_query($connection,$query);	
?>
<script type="text/javascript">
	alert("Order successfully Send .....");
	window.location.href = "all_order.php";
</script>