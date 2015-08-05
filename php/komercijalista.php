<?php
class Kompanija
{
	private $fid;
    private $naziv;
	private $telefon;
	private $email;
	private $websajt;
	private $potencijal;
	private $status;
	private $napomene;
	private $did;
	private $kid1;
	private $kid2;
	
	
	public function getFid()
    {
        return($this->fid);
    }
    public function setFid($fid)
    {
        $this->fid = $fid;
    }
	
    public function getNaziv()
    {
        return($this->naziv);
    }
    public function setNaziv($naziv)
    {
        $this->naziv = $naziv;
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
	
	public function getWebsajt()
    {
        return($this->websajt);
    }
    public function setWebsajt($websajt)
    {
        $this->websajt = $websajt;
    }
	
	public function getPotencijal()
    {
        return($this->potencijal);
    }
    public function setPotencijal($potencijal)
    {
        $this->potencijal = $potencijal;
    }
	
	public function getStatus()
    {
        return($this->status);
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
	
	public function getNapomene()
    {
        return($this->napomene);
    }
    public function setNapomene($napomene)
    {
        $this->napomene = $napomene;
    }
	
	public function getDid()
    {
        return($this->did);
    }
    public function setDid($did)
    {
        $this->did = $did;
    }
	
	public function getKid1()
    {
        return($this->kid1);
    }
    public function setKid1($kid1)
    {
        $this->kid1 = $kid1;
    }
	
	public function getKid2()
    {
        return($this->kid2);
    }
    public function setKid2($kid2)
    {
        $this->kid2 = $kid2;
    }
}
?>