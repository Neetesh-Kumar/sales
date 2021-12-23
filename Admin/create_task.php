<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"crm");
	move_uploaded_file($_FILES["pdf_task"]["tmp_name"],"pdf_task/" . $_FILES["pdf_task"]["name"]);
	$file="pdf_task/".$_FILES["pdf_task"]["name"];

	$query = "insert into add_task values(null,'$_POST[task_number]','$_POST[task]','$_POST[project]','$_POST[dua_date]','$_POST[status]','$file','$_POST[discription_task]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Tasks successfully Create .....")
	window.location.href = "all_task.php";
</script>