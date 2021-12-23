<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"crm");
    $query = " delete from sales_order where order_id =$_GET[aid]";
    $query_run = mysqli_query($connection,$query);
?>
<script>
    alert("Order Deleted.....");
    window.location.href="all_order.php";
</script>