<?php
session_start();

require_once '../config.php';
	
error_reporting( ~E_NOTICE );

if(isset($_GET['view_id']) && !empty($_GET['view_id']))
{
	$view_id = $_GET['view_id'];
	$stmt_edit = $DB_con->prepare('SELECT * FROM orderdetails WHERE user_id=:user_id');
	$stmt_edit->execute(array(':user_id'=>$view_id));
	$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
	extract($edit_row);
}
else
{
	// echo "<script>location.href='view_orders.php?view_id=$user_id'</script>";
}

include("../config.php");
	$stmt_edit = $DB_con->prepare("select sum(order_total) as totalx from orderdetails where user_id=:user_id");
	$stmt_edit->execute(array(':user_id'=>$user_id));
	$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
	extract($edit_row);
	$_SESSION['user_id'];

	$stmt_delete = $DB_con->prepare('update orderdetails set order_status="Online" WHERE user_id =:user_id');
	$stmt_delete->bindParam(':user_id',$_GET['view_id']);
	$stmt_delete->execute();
	echo "<script>location.href='../customers.php'</script>";
?>