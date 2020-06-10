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
$pemesan=$_SESSION['pemesan'];
if(isset($_POST['order_save'])){
    $no_meja = $_SESSION['Meja'];
    $order_name = $_POST['order_name'];
    $order_price = $_POST['order_price'];
    $order_quantity = $_POST['order_quantity'];
    $order_total=$order_price * $order_quantity;
    $order_status='Pending';
    mysql_query("insert into orderdetails (user_id,order_name,order_price,order_quantity,order_total,order_status,order_date) VALUE ($no_meja,'$order_name', $order_price, $order_quantity, $order_total,'$order_status',CURDATE())");
}
?>
<script>
window.onload = function() {
    window.location.href = "Pesan.php?msg=error";
}
</script>
