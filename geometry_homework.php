<?php

//

interface Poly {
  function perimetr();
}

interface Round {
 // function diametr ();
 // function area();
 // function lenth();
}

abstract class PolyFigure implements Poly{
//  abstract function perimeter();

  function __toString(){
    return "You figure is " . $this->righttriangle() . get_class($this) . "." . PHP_EOL . "Perimetr = " . $this->perimetr();
  }

  function __construct($sizes){
    $this->sizes = $sizes;
  }

  function perimetr(){
    return array_sum($this->$sizes);
  }
}

abstract class RoundFigure implements Round{
 // abstract function diametr();
 // abstract function area();
//  abstract function lenth();

  function __toString(){
    return "You figure is " . get_class($this) . "." . PHP_EOL . "Lenth of round = " . $this->lenth . PHP_EOL . "Area = " . $this->area . "." . PHP_EOL . "Diametr = " . $this->diametr;
  }

  function __construct(){
    $this->radius = $radius;
  }
}

class Triangle extends PolyFigure{
  public $sizes;

  function rightTriangle(){
    if (($this->sizes[0] == $this->sizes[1]) && ($this->sizes[1] == $this->sizes[2])) return " Ravnostoronnii ";
  }


}

class Rectangle extends PolyFigure{
  public $sizes;
}

class Square extends PolyFigure{
  public $sizes;
}

class Polygon extends PolyFigure{ //5 и больше сторон
  public $sizes;
}

class Rounds extends RoundFigure{
  public $radius;
}

class Elypse extends RoundFigure{
  public $radius;
}


$new = new Triangle([8,8,8]);
echo $new;

