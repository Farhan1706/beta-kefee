<?php
session_start();
mysql_connect('localhost','id13990263_root','Kefeee333Admin2020');
mysql_select_db('id13990263_kefe');

$username = $_POST['admin_username'];
$password = $_POST['admin_password'];

$login = mysql_query("select * from admin where admin_username='$username' and admin_password='$password'");
$cek = mysql_num_rows($login);

if($cek > 0){
    session_start();
    $_SESSION['admin_username'] = $username;
    $_SESSION['admin_password'] = $password;
    header("location:ondex.php");
}else{
    header("location:index.php");
}
?>