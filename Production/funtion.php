<?php
    function get_productionemployee_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"crm");
        $pro_employee_count = "";
        $query=" select count(*) as pro_employee_count from production_employee";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $pro_employee_count = $row['pro_employee_count'];

        }
        return ($pro_employee_count);
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
    function get_completeordernumber_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"crm");
        $invoice_status_count = "";
        $query=" select count(*) as invoice_status_count= array(1)  from sales_order";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $invoice_status_count = $row['invoice_status_count'];

        }
        return ($invoice_status_count);
    }
?>