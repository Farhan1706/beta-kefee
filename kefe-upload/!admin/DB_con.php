<?php
	$DB_HOST = 'localhost';
	$DB_USER = 'id13990263_root';
	$DB_PASS = 'Farhan1706!N';
	$DB_NAME = 'id13990263_kefe';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
    }
?>