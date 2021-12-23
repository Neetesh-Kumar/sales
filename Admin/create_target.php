<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");

	$query = "insert into target values(null,'$_POST[monthly_amount]','$_POST[sales_name]','$_POST[start_date]','$_POST[end_date]')";
	$query_run = mysqli_query($connection,$query);
    header('Refresh:0; url=show_target.php')

?>
