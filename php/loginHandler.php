<?php
session_start(); 




$ime=$_POST['ime'];
$lozinka=$_POST['lozinka'];

include "/broker.php";

$b = new Broker();

$b->open();

$result = $b->returnKomercijalista($ime, $lozinka);

$row = $result->fetch_object();
	
	$_SESSION['kid']=$row->kid; 
	$_SESSION['imeprezime']=$row->imeprezime; 
	if (strcasecmp($_SESSION['imeprezime'], "Luka Važić") == 0) {
		$_SESSION['admin']=true;
	}
	else $_SESSION['admin']=false;
	header("location: ../index.php");  






?>