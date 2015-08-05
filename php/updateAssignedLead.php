<?php
include "/broker.php";
include "/kompanija.php";

function prikazivanjeGreske($broj,$poruka) 
{
	echo "<b> Greska </b> [$errno] $errstr";
	die();
}
set_error_handler("prikazivanjeGreske",E_USER_WARNING);

$b = new Broker();




if (isset($_POST['fid'])){

$kompanija = new Kompanija();

$fid = trim($_POST['fid']);
$kompanija->setFid($fid);

$imekompanije = trim($_POST['naziv']);
$kompanija->setNaziv($imekompanije);

$telefonkompanije = trim($_POST['telefon']);
$kompanija->setTelefon($telefonkompanije);

$emailkompanije = trim($_POST['email']);
$kompanija->setEmail($emailkompanije);

$websajtkompanije = trim($_POST['websajt']);
$kompanija->setWebsajt($websajtkompanije);

$potencijal = trim($_POST['potencijal']);
$kompanija->setPotencijal($potencijal);

$status = trim($_POST['status']);
$kompanija->setStatus($status);

$napomene = trim($_POST['napomene']);
$kompanija->setNapomene($napomene);

$b->open();

if ($b->updateLead($kompanija)){
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