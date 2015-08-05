<?php
include "/broker.php";

function prikazivanjeGreske($broj,$poruka) 
{
	echo "<b> Greska </b> [$errno] $errstr";
	die();
}
set_error_handler("prikazivanjeGreske",E_USER_WARNING);

$b = new Broker();




if (isset($_POST['kid'])){



$kid = trim($_POST['kid']);

$ime = trim($_POST['ime']);
$prezime = trim($_POST['prezime']);
$datum_zaposlenja = trim($_POST['datum_zaposlenja']);


$b->open();

if ($b->updateKomercijalista($kid, $ime, $prezime, $datum_zaposlenja)){
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