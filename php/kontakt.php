<?php
class Kontakt
{
    private $fid;
	private $koid;
	private $ime;
	private $prezime;
	private $telefon;
	private $email;
	private $napomene;

	
	
	public function getFid()
    {
        return($this->fid);
    }
    public function setFid($fid)
    {
        $this->fid = $fid;
    }
	
	public function getKoid()
    {
        return($this->koid);
    }
    public function setKoid($koid)
    {
        $this->koid = $koid;
    }
	
	
    public function getIme()
    {
        return($this->ime);
    }
    public function setIme($ime)
    {
        $this->ime = $ime;
    }
	
	public function getPrezime()
    {
        return($this->prezime);
    }
    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    }
	
	public function getTelefon()
    {
        return($this->telefon);
    }
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;
    }
	
	public function getEmail()
    {
        return($this->email);
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
	
	
	
	public function getNapomene()
    {
        return($this->napomene);
    }
    public function setNapomene($napomene)
    {
        $this->napomene = $napomene;
    }
	
	
}
?>