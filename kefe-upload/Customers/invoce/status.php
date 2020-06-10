<?php
session_start();

$link = mysql_connect('localhost', 'id13990263_root', 'Farhan1706!N');
            if (!$link) {
                die('Not connected : ' . mysql_error());
            }
            
            $db_selected = mysql_select_db('id13990263_kefe', $link);
            if (!$db_selected) {
                die ('Can\'t use foo : ' . mysql_error());
            }

$no_meja=$_SESSION['Meja'];

$status = mysql_query("UPDATE orderdetails SET order_status='Bayar' WHERE user_id='$no_meja'");
header("location:../destroy.php");
?>
