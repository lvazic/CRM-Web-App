<?php
include "/broker.php";

function prikazivanjeGreske($broj,$poruka) 
{
	echo "<b> Greska </b> [$errno] $errstr";
	die();
}
set_error_handler("prikazivanjeGreske",E_USER_WARNING);

$b = new Broker();




if (isset($_POST['koid'])){

$koid = $_POST['koid'];

$b->open();

if ($b->deleteContact($koid)){
$jTableResult = array();
$jTableResult['Result'] = "OK";
print json_encode($jTableResult);
} else {
$jTableResult = array();
$jTableResult['Result'] = "ERROR";
print json_encode($jTableResult);
}

$b->close();
}




?>