<?php
require_once "bidangAsal.php";
class Lingkaran extends Bentuk2D{
    public $jari2;
    public function __construct($jari2) {
        $this->jari2 = $jari2;
    }

    public function namaBidang(){
        echo "Lingkaran";
    }

    public function luasBidang(){
        $luasLingkar =  pi() * $this->jari2 * $this->jari2 ;
        return $luasLingkar;
    }

    public function kelilingBidang(){
        $kelLingkar = 2 * pi() * $this->jari2;
        return $kelLingkar;
    }
    public function atribut(){
        return "Jari-jari: ".$this->jari2; 
    }
}

?>