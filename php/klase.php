<?php

class CartEventBox
{
    public $counter;
    public $id; //id_dogadjaja
    public $name; //karte za nesto
    public $kolicina;
    public $pozicija; 
    public $cena;
    public $tip;
    
    public function __construct($id,$name,$kolicina,$pozicija,$cena,$tip)
    {
        $this->counter = $_SESSION['brojilo']++;
        $this->id=$id;
        $this->name=$name;
        $this->kolicina=$kolicina;
        $this->pozicija = $pozicija;
        $this->cena=$cena;
        $this->tip = $tip;
    }
}
class Komentar
{
    public $idd;
    public $id;
    public $username;
    public $komentar;
    
    function __construct($idd,$id,$un,$komentar) 
    {
        $this->idd = $idd;
        $this->id=$id;
        $this->username=$un;
        $this->komentar=$komentar;
    }
}
class Rejting
{
    public $id;
    public $username;
    public $ocena;
    
    function __construct($id,$username,$ocena) {
        $this->id=$id;
        $this->username=$username;
        $this->ocena=$ocena;
    }
}