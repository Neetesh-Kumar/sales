<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"crm");
$invoice_id=$_GET['sid'];
$invoice_status=$_GET['status'];


$query = "update invoice set invoice_status=$invoice_status where invoice_id=$invoice_id";
$query_run = mysqli_query($connection,$query);

header('location:all_invoice.php');
?>