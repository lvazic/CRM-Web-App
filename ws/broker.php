<?php

class Broker {

    private $link;
	private $mysql_server = "localhost";
	private $mysql_user = "root";
	private $mysql_password = "";
	private $mysql_db = "crm";

    public function __construct() {
        $this->link = null;
    }

    public function close() {
        $this->link->close();
    }
    public function query($query) {
        return $this->link->query($query);
    }
	
	public function addUser($korisnik) {
		$sql = "INSERT INTO korisnici (ime, email) VALUES ('".$korisnik->getIme()."', '".$korisnik->getEmail()."')";
		return $this->query($sql);	
	}
	
	public function deleteContact($koid) {
		$sql = "DELETE FROM kontakt_osoba WHERE koid = '".$koid."'";
		return $this->query($sql);	
	}
	
	public function addLead($kompanija, $kontakt) {
		$sql = "INSERT INTO firma (naziv, telefon, email, websajt, potencijal, status, napomene, did, kid_1) 
		VALUES ('".$kompanija->getNaziv()."', '".$kompanija->getTelefon()."', '".$kompanija->getEmail()."', '".$kompanija->getWebsajt()."', '".$kompanija->getPotencijal()."', '".$kompanija->getStatus()."', '".$kompanija->getNapomene()."', '".$kompanija->getDid()."', '".$kompanija->getKid1()."')";
		if ($this->query($sql)) {
		$last_id = $this->link->insert_id;
		$sql = "INSERT INTO kontakt_osoba (fid, ime, prezime, telefon, email, napomene) VALUES ('".$last_id."', '".$kontakt->getIme()."', '".$kontakt->getPrezime()."', '".$kontakt->getTelefon()."', '".$kontakt->getEmail()."', '".$kontakt->getNapomene()."')";
		return $this->query($sql);
		
		}
		return false;
		
	}
	
	public function assignLead($fid, $kid) {
		$sql = "UPDATE firma SET kid_2 = ('".$kid."'), status = 'u razmatranju' WHERE fid = ('".$fid."')";
		return $this->query($sql);	
	}
	
	public function updateLead($k) {
		$sql = "UPDATE firma SET naziv = ('".$k->getNaziv()."'), telefon = ('".$k->getTelefon()."'), email = ('".$k->getEmail()."'), websajt = ('".$k->getWebsajt()."'), potencijal = ('".$k->getPotencijal()."'), status = ('".$k->getStatus()."'), napomene = ('".$k->getNapomene()."') WHERE fid = ('".$k->getFid()."')";
		return $this->query($sql);	
	}
	
	public function updateContact($k) {
		$sql = "UPDATE kontakt_osoba SET ime = ('".$k->getIme()."'), prezime = ('".$k->getPrezime()."'), telefon = ('".$k->getTelefon()."'), email = ('".$k->getEmail()."'), napomene = ('".$k->getNapomene()."') WHERE koid = ('".$k->getKoid()."')";
		return $this->query($sql);	
	}
	
	public function addContact($k) {
		$sql = "INSERT INTO kontakt_osoba (fid, ime, prezime, telefon, email, napomene)  VALUES('".$k->getFid()."','".$k->getIme()."', '".$k->getPrezime()."', '".$k->getTelefon()."', '".$k->getEmail()."', '".$k->getNapomene()."')";
		return ($this->query($sql));
	}
	
	public function addSales($fid, $datum, $napomene) {
		$sql = "INSERT INTO kupovina (fid, datum, napomene)  VALUES('".$fid."','".$datum."', '".$napomene."')";
		$this->query($sql);
		$sql = "SELECT MAX(kupid) AS poslednji from kupovina";
		$q = $this->query($sql);
		$red = $q->fetch_object();
		$poslednji = $red->poslednji;
		return $poslednji;
	}
	
	public function addSalesItem($fid, $kupid,$kolicina, $pid) {
		$sql = "INSERT INTO stavka_kupovine (fid, kupid, kolicina, pid)  VALUES('".$fid."','".$kupid."', '".$kolicina."', '".$pid."')";
		return ($this->query($sql));
	}
	
	
	public function returnLastContact() {
		$sql = "SELECT MAX(koid) AS poslednji from kontakt_osoba";
		$q = $this->query($sql);
		$red = $q->fetch_object();
		$poslednji = $red->poslednji;
		$sql = "SELECT fid AS kontaktfid, koid, ime, prezime, telefon, email, napomene FROM kontakt_osoba WHERE koid = '".$poslednji."'";
		return ($this->query($sql));	
	}
	
	public function returnNumberOfContacts() {
		$sql = "SELECT COUNT(*) AS count from kontakt_osoba";
		return ($this->query($sql));	
	}
	
	
	public function returnNewLeads() {
		$sql = "SELECT firma.fid, firma.naziv, firma.websajt, firma.potencijal, firma.napomene, delatnost.naziv AS delatnost, CONCAT(komercijalista.ime, ' ',komercijalista.prezime) AS dodao FROM firma JOIN komercijalista ON firma.kid_1 = komercijalista.kid JOIN delatnost ON firma.did = delatnost.did WHERE firma.kid_2 IS NULL";

		return $this->query($sql);	
	}
	

	
	public function returnAssignedLeads($kid) {
		$sql = "SELECT firma.fid, firma.naziv, firma.telefon, firma.email, firma.websajt, firma.potencijal, firma.status, firma.napomene, delatnost.naziv AS delatnost, CONCAT(komercijalista.ime, ' ',komercijalista.prezime) AS dodao FROM firma JOIN komercijalista ON firma.kid_1 = komercijalista.kid JOIN delatnost ON firma.did = delatnost.did WHERE firma.kid_2 = ('".$kid."') AND firma.status = 'u razmatranju'";

		return $this->query($sql);	
	}
	
	public function returnAssignedAccounts($kid) {
		$sql = "SELECT firma.fid, firma.naziv, firma.telefon, firma.email, firma.websajt, firma.potencijal, firma.status, firma.napomene, delatnost.naziv AS delatnost, CONCAT(komercijalista.ime, ' ',komercijalista.prezime) AS dodao FROM firma JOIN komercijalista ON firma.kid_1 = komercijalista.kid JOIN delatnost ON firma.did = delatnost.did WHERE firma.kid_2 = ('".$kid."') AND firma.status = 'dodeljen'";

		return $this->query($sql);	
	}
	
	public function returnCompanyContacts($fid) {
		$sql = "SELECT  koid, ime, prezime, telefon, email, napomene FROM kontakt_osoba WHERE fid = ('".$fid."')";

		return $this->query($sql);	
	}
	
	public function returnCompanySales($fid) {
		$sql = "SELECT  kupid, datum, napomene FROM kupovina WHERE fid = ('".$fid."')";
		$sql = "SELECT kupovina.kupid, kupovina.datum, kupovina.napomene, SUM(stavka_kupovine.kolicina*cenovnik.cena) AS vrednost FROM kupovina JOIN stavka_kupovine ON kupovina.kupid = stavka_kupovine.kupid JOIN proizvod ON stavka_kupovine.pid = proizvod.pid JOIN cenovnik ON proizvod.pid = cenovnik.pid WHERE cenovnik.datumdo IS NULL AND kupovina.fid = ('".$fid."')  GROUP BY kupovina.kupid";

		return $this->query($sql);	
	}
	
	public function returnSalesItems($kupid) {
		$sql = "SELECT kupid, skid, stavka_kupovine.kolicina, proizvod.naziv FROM stavka_kupovine JOIN proizvod ON stavka_kupovine.pid = proizvod.pid WHERE kupid = ('".$kupid."')";

		$sql = "SELECT kupid, skid, stavka_kupovine.kolicina, proizvod.naziv, cenovnik.cena, (stavka_kupovine.kolicina*cenovnik.cena) AS ukupno FROM stavka_kupovine LEFT JOIN proizvod ON stavka_kupovine.pid = proizvod.pid LEFT JOIN cenovnik ON proizvod.pid = cenovnik.pid WHERE cenovnik.datumdo IS NULL AND kupid = ('".$kupid."')";
		return $this->query($sql);	
	}
	
	public function returnAllContacts() {
		$sql = "SELECT kontakt_osoba.fid, kontakt_osoba.koid, CONCAT(kontakt_osoba.ime, ' ', kontakt_osoba.prezime) AS imeprezime, kontakt_osoba.telefon, kontakt_osoba.email, firma.naziv FROM kontakt_osoba JOIN firma ON kontakt_osoba.fid = firma.fid";

		return $this->query($sql);	
	}
	
	public function returnSupplies() {
		$sql = "SELECT naziv, kolicina FROM proizvod";

		return $this->query($sql);	
	}
	
	public function returnAccountValue($kid) {
		$sql = "SELECT firma.naziv, SUM((stavka_kupovine.kolicina*cenovnik.cena)) AS ukupno FROM firma LEFT JOIN stavka_kupovine ON firma.fid = stavka_kupovine.fid LEFT JOIN proizvod ON stavka_kupovine.pid = proizvod.pid LEFT JOIN cenovnik ON proizvod.pid = cenovnik.pid WHERE cenovnik.datumdo IS NULL AND stavka_kupovine.kolicina*cenovnik.cena IS NOT NULL AND firma.kid_2 = ('".$kid."') GROUP BY firma.naziv";

		return $this->query($sql);	
	}
	
	public function returnDelatnost() {
		$sql = "SELECT did, naziv FROM delatnost";

		return $this->query($sql);	
	}
	
	public function returnProducts() {
		$sql = "SELECT proizvod.pid, proizvod.naziv, cenovnik.cena FROM proizvod LEFT JOIN cenovnik ON proizvod.pid = cenovnik.pid WHERE cenovnik.datumdo IS NULL";

		return $this->query($sql);	
	}
	
	public function returnKomercijalista($ime, $lozinka) {
		$sql = "SELECT kid, CONCAT(ime, ' ',prezime) AS imeprezime FROM komercijalista WHERE ime = ('".$ime."') AND lozinka = ('".$lozinka."')";

		return $this->query($sql);	
	}
	
	public function returnEarnings($kid) {
		$sql = "SELECT datum, iznos, bonus FROM plata WHERE kid = ('".$kid."')";

		return $this->query($sql);	
	}
	
		public function returnProductSalesByMonth() {
		$sql = "SELECT proizvod.naziv, kupovina.datum, SUM((stavka_kupovine.kolicina*cenovnik.cena)) AS ukupno FROM firma LEFT JOIN kupovina ON firma.fid = kupovina.fid LEFT JOIN stavka_kupovine ON kupovina.kupid = stavka_kupovine.kupid LEFT JOIN proizvod ON stavka_kupovine.pid = proizvod.pid LEFT JOIN cenovnik ON proizvod.pid = cenovnik.pid WHERE cenovnik.datumdo IS NULL AND stavka_kupovine.kolicina*cenovnik.cena IS NOT NULL GROUP BY kupovina.datum, proizvod.naziv";

		return $this->query($sql);	
	}
	
		public function returnNumberOfAssignedLeads($kid) {
		$sql = "SELECT COUNT(*) AS assignedLeads from firma where kid_2 = ('".$kid."') AND status = 'u razmatranju'";

		return $this->query($sql);	
	}
	
		public function returnNumberOfAssignedAccounts($kid) {
		$sql = "SELECT COUNT(*) AS assignedAccounts from firma where kid_2 = ('".$kid."') AND status = 'dodeljen'";

		return $this->query($sql);	
	}
	
			public function returnNumberOfSales($kid) {
		$sql = "SELECT COUNT(*) As numberOfSales from firma JOIN kupovina ON firma.fid = kupovina.fid WHERE firma.kid_2 = ('".$kid."')";

		return $this->query($sql);	
	}
	
		public function returnTotalSalesValue($kid) {
		$sql = "SELECT SUM((stavka_kupovine.kolicina*cenovnik.cena)) AS ukupno FROM firma LEFT JOIN stavka_kupovine ON firma.fid = stavka_kupovine.fid LEFT JOIN proizvod ON stavka_kupovine.pid = proizvod.pid LEFT JOIN cenovnik ON proizvod.pid = cenovnik.pid WHERE cenovnik.datumdo IS NULL AND stavka_kupovine.kolicina*cenovnik.cena IS NOT NULL AND firma.kid_2 = ('".$kid."')";

		return $this->query($sql);	
	}
	
	public function returnError() {
		
		return $this->link->error;	
	}

    public function open() {
        $this->link = new mysqli($this->mysql_server, $this->mysql_user, $this->mysql_password, $this->mysql_db);
		$this->link->set_charset("utf8");
        if ($this->link)
		return false;
	   return true;    
    }


}
?>
