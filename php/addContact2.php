<?php
include "/broker.php";
include "/kontakt.php";

try
{
	//Open database connection
	$con = mysql_connect("localhost","root","");
	mysql_select_db("crm", $con);


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
	
		//Insert record into database
		$result = mysql_query("INSERT INTO kontakt_osoba (fid, ime, prezime, telefon, email, napomene)  VALUES('".$k->getFid()."','".$k->getIme()."', '".$k->getPrezime()."', '".$k->getTelefon()."', '".$k->getEmail()."', '".$k->getNapomene()."')");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM kontakt_osoba WHERE koid = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	
	//Close database connection
	mysql_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>