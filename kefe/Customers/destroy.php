<?php 
session_start();
session_destroy();
header("Location:Meja.php?msg=invoice");
?>