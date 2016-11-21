<?php
session_start();

class Heroe{

  static $instances=array();
  var $nombreHeroe;
  var $ad;
  var $ap;
  var $vida;
  var $mana;
  var $path;
  var $id;

function __construct ($a, $b, $c, $d, $e, $f) {
          $this->nombreHeroe = $a;
          $this->ad = $b;
          $this->ap = $c;
          $this->vida = $d;
          $this->mana = $e;
          $this->id = $f;
          Heroe::$instances[] = $this;
}

function printStats(){
  echo "Nombre: ". $this->nombreHeroe."<br><br>";
  echo "AD: ".$this->ad."<br><br>";
  echo "AP: ".$this->ap."<br><br>";
  echo "Vida : ".$this->vida."<br><br>";
  echo "Mana : ".$this->mana."<br><br>";

}

function hit($otherHeroe){

  $otherHeroe->vida = $otherHeroe->vida - $this->ad;
}

function spell($otherHeroe){

  $otherHeroe->vida = $otherHeroe->vida - $this->ap;
  $this->mana = $this->mana - ($this->ap/2);
}

}
//Arthas
$arthas = new Heroe("Arthas", 100, 50, 70, 20, 1);
$arthas->path = "images/arthas.jpg";

//5491154570009

//Tyrande
$tyrande = new Heroe("Tyrande", 80, 70, 60, 30, 2);
$tyrande->path = "images/tyrande.jpg";

//Jorge
$jorge = new Heroe("Jorge", 200, 20, 20, 5, 3);
$jorge->path = "/images/jorge.jpg";
?>
