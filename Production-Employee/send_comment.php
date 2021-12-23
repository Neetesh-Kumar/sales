<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");
	move_uploaded_file($_FILES["comment_pdf"]["tmp_name"],"comment_pdf/" . $_FILES["comment_pdf"]["name"]);
	$file="comment_pdf/".$_FILES["comment_pdf"]["name"];

	$query = "INSERT into comment_order values(null,'$_POST[order_number]','$_POST[pro_employee_id]','$_POST[pro_employee_name]','$file','$_POST[comment_order]')";
	$query_run = mysqli_query($connection,$query);
	header('Refresh: 0; url=all_order.php');
?>
