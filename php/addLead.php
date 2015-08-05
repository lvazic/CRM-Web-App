<?php
include "/broker.php";
include "/kompanija.php";
include "/kontakt.php";

function prikazivanjeGreske($broj,$poruka) 
{
	echo "<b> Greska </b> [$errno] $errstr";
	die();
}
set_error_handler("prikazivanjeGreske",E_USER_WARNING);

$b = new Broker();




if (isset($_POST['imekompanije']) && isset($_POST['telefonkompanije']) && isset($_POST['potencijal'])){

$kompanija = new Kompanija();
$imekompanije = trim($_POST['imekompanije']);
$kompanija->setNaziv($imekompanije);
$telefonkompanije = trim($_POST['telefonkompanije']);
$kompanija->setTelefon($telefonkompanije);
$emailkompanije = trim($_POST['emailkompanije']);
$kompanija->setEmail($emailkompanije);
$websajtkompanije = trim($_POST['websajtkompanije']);
$kompanija->setWebsajt($websajtkompanije);
$potencijal = trim($_POST['potencijal']);
$kompanija->setPotencijal($potencijal);
$delatnost = trim($_POST['delatnost']);
$kompanija->setDid($delatnost);
$status = "novi";
$kompanija->setStatus($status);
$kid1 = $_GET['kid'];
$kompanija->setKid1($kid1);


$k = new Kontakt();

$imeosobe = trim($_POST['imeosobe']);
$k->setIme($imeosobe);

$prezimeosobe = trim($_POST['prezimeosobe']);
$k->setPrezime($prezimeosobe);

$telefonosobe = trim($_POST['telefonosobe']);
$k->setTelefon($telefonosobe);

$emailosobe = trim($_POST['emailosobe']);
$k->setEmail($emailosobe);

$napomeneosobe = trim($_POST['napomeneosobe']);
$k->setNapomene($napomeneosobe);

$b->open();

if ($b->addLead($kompanija, $k)){
echo "<p>Lead je dodat u bazu.</p>";
} else {
echo "<p>Nastala je greška pri ubacivanju leada</p>" . $b->returnError();
}
/* $sql = "SELECT id FROM korisnici WHERE email = ('".$email."')";
if (!$q=$b->returnUserID($k1)){
echo "<p>Nastala je greska pri izvodenju upita</p>" . mysql_query();
exit();
}
$kid = $q->fetch_object()->id;

if ($b->addRecept($kategorija, $sastojci, $recept, $kid)){
echo "<p>Recept je dodat u bazu.</p>";
} else {
echo "<p>Nastala je greška pri ubacivanju recepta</p>" . $b->returnError();
} */
$b->close();
}




?>