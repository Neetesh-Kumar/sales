<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"crm");
    $query = " delete from lead where lead_id =$_GET[aid]";
    $query_run = mysqli_query($connection,$query);
?>
<script>
    alert("Lead Deleted.....");
    window.location.href="all_leads.php";
</script>