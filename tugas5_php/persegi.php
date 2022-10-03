<?php

require_once "bidangAsal.php";

class Persegi extends Bentuk2D{
    public $panjang, $lebar;
    public function __construct($panjang, $lebar){
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function namaBidang(){
        echo "Persegi Panjang";
    }

    public function luasBidang (){
        $luasPersegi = $this->panjang * $this->lebar;
        return $luasPersegi;
    }

    public function kelilingBidang(){
        $kelilingPersegi = 2 * ($this->panjang + $this->lebar);
        return $kelilingPersegi;
    }

    public function atribut(){
        return "Panjang: ".$this->panjang."<br> Lebar: ".$this->lebar; 
    }
}