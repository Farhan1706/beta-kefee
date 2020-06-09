<?php
session_start();

$query1=mysql_connect("localhost","root","");
mysql_select_db("kefe",$query1);

$no_meja=$_SESSION['Meja'];

$status = mysql_query("UPDATE orderdetails SET order_status='Bayar' WHERE user_id='$no_meja'");
header("location:../destroy.php");
?>
