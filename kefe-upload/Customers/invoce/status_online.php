<?php
session_start();

$query1=mysql_connect("localhost","id13990263_root","Kefeee333Admin2020");
mysql_select_db("id13990263_kefe",$query1);

$no_meja=$_SESSION['Meja'];

$status = mysql_query("UPDATE orderdetails SET order_status='Online' WHERE user_id='$no_meja'");
header("location:../destroy.php");
?>
