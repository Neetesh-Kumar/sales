<?php
    function get_employee_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"crm");
        $sales_count = "";
        $query=" select count(*) as sales_count from sales";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $sales_count = $row['sales_count'];
        }
        return ($sales_count);
    }
    function get_proemployee_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"crm");
        $pro_count = "";
        $query=" select count(*) as pro_count from production";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $pro_count = $row['pro_count'];
        }
        return ($pro_count);
    }
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