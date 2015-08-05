<?php 
include "/broker.php";

function prikazivanjeGreske($broj,$poruka) 
{
	echo "<b> Greska </b> [$errno] $errstr";
	die();
}
set_error_handler("prikazivanjeGreske",E_USER_WARNING);

$b = new Broker();




if (isset($_POST['account']) && isset($_POST['datum']) && isset($_POST['proizvod']) && isset($_POST['kolicina'])){


$fid = trim($_POST['account']);

$datum = trim($_POST['datum']);

$napomene = trim($_POST['napomene']);

$proizvod = $_POST['proizvod'];

$kolicina = $_POST['kolicina'];

$del = explode("/", $datum);

$formdat = $del[2]."-".$del[0]."-".$del[1];





$b->open();

//$b->addSales($fid,$datum,$napomene);

if ($kupid = $b->addSales($fid,$formdat,$napomene)){

foreach ($proizvod as $i => $pid) {
  $kol = $kolicina[$i];
  
  $b->addSalesItem($fid, $kupid, $kol, $pid);

  
  }
echo "<p>Prodaja je uspešno uneta.</p>";


} else {
echo "<p>Nastala je greška pri unosu prodaje</p>" . $b->returnError();
}

$b->close();
}




?>