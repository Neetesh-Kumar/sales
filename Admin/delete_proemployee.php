<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"crm");
    $query = " delete from production where pro_id =$_GET[aid]";
    $query_run = mysqli_query($connection,$query);
?>
<script>
    alert("Account Deleted.....");
    window.location.href="all_employee.php";
</script>