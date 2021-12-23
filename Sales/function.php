<?php
    function get_invoicenumber_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"crm");
        $invoice_number_count = "";
        $query=" select count(*) as invoice_number_count from invoice";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $invoice_number_count = $row['invoice_number_count'];

        }
        return ($invoice_number_count);
    }
    function get_leadnumber_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"crm");
        $lead_number_count = "";
        $query=" select count(*) as lead_number_count from lead";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $lead_number_count = $row['lead_number_count'];

        }
        return ($lead_number_count);
    }
    function get_ordernumber_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"crm");
        $order_number_count = "";
        $query=" select count(*) as order_number_count from sales_order";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $order_number_count = $row['order_number_count'];

        }
        return ($order_number_count);
    }
?>