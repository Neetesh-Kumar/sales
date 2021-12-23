<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");

	$query = "insert into lead values(null,'$_POST[lead_number]','$_POST[lead_name]','$_POST[lead_email]','$_POST[lead_mobile]','$_POST[lead_website]','$_POST[lead_comment]')";
	$query_run = mysqli_query($connection,$query);

?>
<script type="text/javascript">
	alert("Lead successfully Create .....")
	window.location.href = "all_leads.php";
</script>