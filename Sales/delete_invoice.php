<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"crm");
    $query = " delete from invoice where invoice_id =$_GET[aid]";
    $query_run = mysqli_query($connection,$query);
?>
<script>
    alert("Invoice Deleted.....");
    window.location.href="all_invoice.php";
</script>