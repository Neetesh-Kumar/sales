<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");
	move_uploaded_file($_FILES["proof_pdf"]["tmp_name"],"proof_pdf/" . $_FILES["proof_pdf"]["name"]);
	$file="proof_pdf/".$_FILES["proof_pdf"]["name"];

	$query = "insert into invoice values(null,'$_POST[invoice_number]','$_POST[lead_number]','$_POST[invoice_amount]','$_POST[invoice_status]','$file','$_POST[discription_invoice]')";

	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Invoice successfully Create .....")
	window.location.href = "all_invoice.php";
</script>