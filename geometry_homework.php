<?php

//

interface Poly {
  function perimetr();
}

interface Rounds {
  function area();
  function lenth();
}

abstract class PolyFigure implements Poly{
//abstract function perimeter();

  function __toString(){
    return "You figure is " . $this->regularTriangle() . strtolower(get_class($this)) . "." . PHP_EOL . "Perimetr = " . $this->perimetr() . PHP_EOL . $this->canArea();
  }

  function __construct($sizes){
    $this->sizes = $sizes;
  }

  function perimetr(){
    return array_sum($this->sizes);
  }

  function regularTriangle(){ //проверка на равносторонний треугольник
    if (($this->sizes[0] == $this->sizes[1]) && ($this->sizes[1] == $this->sizes[2])) return " regular ";
  }

  function canArea(){
    if (count($this->sizes) < 5) return "Area = " . $this->area();
  }

}

abstract class RoundFigure implements Rounds{
  abstract function area();
  abstract function lenth();

  function __toString(){
    return "You figure is " . get_class($this) . "." . PHP_EOL . "Lenth = " . $this->lenth() . PHP_EOL . "Area = " . $this->area() . ".";
  }

  function __construct($radius){
    $this->radius = $radius;
  }
}

class Triangle extends PolyFigure{
  public $sizes;

  function area(){ //площадь по формуле Герона
    return sqrt((array_sum($this->sizes) / 2) * ((array_sum($this->sizes) / 2) - $this->sizes[0]) * ((array_sum($this->sizes) / 2) - $this->sizes[1]) * ((array_sum($this->sizes) / 2) - $this->sizes[2]));
  }
}

class Rectangle extends PolyFigure{
  public $sizes;

  function area(){
    return $this->sizes[0]*$this->sizes[1];
  }
}

class Square extends PolyFigure{
  public $sizes;

  function area(){
    return $this->sizes[0]*$this->sizes[1];
  }
}

class Polygon extends PolyFigure{ //5 и больше сторон
  public $sizes;

  function area(){
    return "I cant do this, its so difficul.";
  }
}

class Round extends RoundFigure{
  public $radius;

  function area(){
    return M_PI * pow($this->radius[0], 2);
  }

  function lenth(){
    return 2 * M_PI * $this->radius[0];
  }
}

class Elypse extends RoundFigure{
  public $radius;

  function area(){
    return M_PI * pow((array_sum($this->radius)/2), 2);
  }

  function lenth(){
    return 2 * M_PI * (array_sum($this->radius)/2);
  }

}

function createFigure($sizes){ //проверяет кол введенных символов и создает объект
  $len = count($sizes);
  //$sizes = array_map(abs, $sizes1);

  if($len == 1){
    return new Round($sizes);
  } elseif ($len == 2){
    return new Elypse($sizes);
  } elseif ($len == 3){
    return new Triangle($sizes);
  } elseif (($len == 4) && ($sizes[0] == $sizes[1])){
    return new Square($sizes);
  } elseif (($len == 4) && ($sizes[0] == $sizes[2])){
    return new Rectangle($sizes);
  } else {
    return new Polygon($sizes);
  }
}

function arrFigure(){
  $handle = fopen('php://stdin','r');
  echo "How mutch figure you would like create?" . PHP_EOL;
  $numFig = fgets($handle);

  $massFigure = [];
  for ($i=1; $i <= $numFig; $i++) { 
    echo "Enter your {$i} figure parse ,: " . PHP_EOL;
    $massFigure[] = createFigure(explode(',', fgets($handle)));
    //var_dump($massFigure);
  }

  return $massFigure;
}

$ee = arrFigure();

foreach($ee as $key){
  echo $key . PHP_EOL;
}

