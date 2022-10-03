<?php

require_once "bidangAsal.php";
class Segitiga extends Bentuk2D{
    public $alas, $tinggi;
    public function __construct($alas, $tinggi) {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function namaBidang(){
        echo "Segitiga Siku-Siku";
    }

    public function luasBidang(){
        $luasSegitiga = $this->alas * $this->tinggi/ 2 ;
        return $luasSegitiga;
    }

    public function kelilingBidang(){
        $sisi = sqrt($this->alas*$this->alas + $this->tinggi*$this->tinggi);
        $kelSegitiga = $sisi + $this->alas + $this->tinggi;
        return $kelSegitiga;
    }

    public function atribut(){
        return "Alas: ".$this->alas."<br> Tinggi: ".$this->tinggi; 
    }

}