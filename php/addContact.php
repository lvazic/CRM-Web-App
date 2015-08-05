<?php
include "/broker.php";
include "/kontakt.php";

function prikazivanjeGreske($broj,$poruka) 
{
	echo "<b> Greska </b> [$errno] $errstr";
	die();
}
set_error_handler("prikazivanjeGreske",E_USER_WARNING);

$b = new Broker();




if (isset($_POST['kontaktfid'])){

$k = new Kontakt();

$fid = trim($_POST['kontaktfid']);
$k->setFid($fid);

$imeosobe = trim($_POST['ime']);
$k->setIme($imeosobe);

$prezimeosobe = trim($_POST['prezime']);
$k->setPrezime($prezimeosobe);

$telefonosobe = trim($_POST['telefon']);
$k->setTelefon($telefonosobe);

$emailosobe = trim($_POST['email']);
$k->setEmail($emailosobe);

$napomeneosobe = trim($_POST['napomene']);
$k->setNapomene($napomeneosobe);

$b->open();

if ($b->addContact($k)){
	
	$result = $b->returnLastContact();
//Add all records to an array
/* $rows = array();
while($row = $result->fetch_object())
{
    $rows[] = $row;
} */
	
$jTableResult = array();
$jTableResult['Result'] = "OK";
$jTableResult['Record'] = $row = $result->fetch_object();
print json_encode($jTableResult);
} else {
$jTableResult = array();
$jTableResult['Result'] = "ERROR";
print json_encode($jTableResult);}

$b->close();
}




?>