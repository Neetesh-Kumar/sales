<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");
	move_uploaded_file($_FILES["pdf_order"]["tmp_name"],"pdf_order/" . $_FILES["pdf_order"]["name"]);
	$file="pdf_order/".$_FILES["pdf_order"]["name"];

	$query = "insert into sales_order values(null,'$_POST[order_number]','$_POST[lead_number]','$_POST[invoice_number]','$_POST[sales_person]','$_POST[course_name]','$_POST[invoice_status]','none','$_POST[link]','$_POST[sale_startdate]','$_POST[sale_enddate]','$file','$_POST[discription_order]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Order successfully Create .....")
	window.location.href = "all_order.php";
</script>