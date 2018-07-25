<?php
interface Cars
{
    public function priceCar();
}

interface TVs
{
    public function __construct($brand, $diagonal, $resolution);
    public function totalPrice();
}
interface Pens
{
    public function penInfo();
}
interface Ducks
{
    public function __construct();
    public function presence ();
}
interface Products
{
    public function getProducts();
}
class FirstClass
{
    public $brand;
    public function __construct($brand)
    {
        $this->brand = $brand;
    }
    public function getBrand()
    {
        return $this->brand;
    }
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }
}
echo "<br>";
class Car extends FirstClass implements Cars
{
    public $color;
    public $enginePower;
    public $automatedGearbox;
    public function priceCar()
    {
        if($this->automatedGearbox == 1)
        {
            return "Price " . $this->brand . " is: " . $this->price*1.8 . "$";
        } else
            return $this->price;
    }
}
$carAudi = new Car("Mersedes");
$carAudi->enginePower = 3;
$carAudi->price = 10000;
$carAudi->automatedGearbox = 1;
echo $carAudi->priceCar() . PHP_EOL;
echo "<br>";
$carRenault = new Car("Audi");
$carRenault->price = 12000;
$carRenault->color = "Black";
$carRenault->enginePower = 2;
$carRenault->automatedGearbox = 1;
echo $carRenault->priceCar() . PHP_EOL;
echo "<br>";

class Tv extends FirstClass implements TVs
{
    public $diagonal;
    public $resolution;
    public $totalPrice;
    public function __construct($brand, $diagonal, $wifi)
    {
        parent::__construct($brand);
        $this->diagonal = $diagonal;
        $this->wifi = $wifi;
    }
    public function totalPrice()
    {
        if((strtolower(parent::getBrand()) == "Sumsung" && $this->diagonal >= 1.1 && $this->wifi == "Yes") || (strtolower(parent::getBrand()) == "LG" && $this->diagonal >= 1.1 && $this->wifi == "Yes"))
        {
            return  100500;
        }
        return 35000;
    }
}
$tvSumsung = new TV('Sumsung', 1.1, 'Yes');
$tvLg = new TV('LG', 1.1, 'No');
echo $tvSumsung->brand . "<br>";
echo $tvSumsung->totalPrice(). "<br>";
echo $tvLg->brand . "<br>";
echo $tvLg->totalPrice(). "<br>";
echo "<br>";

class Pen extends FirstClass implements Pens
{
    public $color;
    public $price;
    public function penInfo()
    {
        return parent::getBrand() . ": " . $this->color . "-" . $this->price;
    }
}
$penErichKrause = new Pen("BIC");
$penErichKrause->color = 'blue';
$penErichKrause->price = 100;
echo $penErichKrause->penInfo() . PHP_EOL;
echo "<br>";
$penParker = new Pen("Parker");
$penParker->color = 'black';
$penParker->price = 200;
echo $penParker->penInfo() . PHP_EOL;
echo "<br>";

final class Duck implements Ducks
{
    public static $count = 0;
    public function __construct()
    {
        self::$count++;
    }
    public function presence()
    {
        if(self::$count == 1)
        {
            return "Duck is here" . "<br>";
        }
        else
        {
            return "Ducks are here" . "<br>";
        }
    }
}
$duckWhite = new Duck;
echo $duckWhite->presence() . PHP_EOL;
$duckWhite2 = new Duck;
echo $duckWhite2->presence() . PHP_EOL;
$duckWhite3 = new Duck;
echo $duckWhite3->presence() . PHP_EOL;
echo "<br>";

class Product extends FirstClass implements Products
{
    public $bag;
    public $shoes;
    public $bagPrice;
    public $shoesPrice;
    public $price;
    public function getProducts()
    {
        $this->price = ($this->bag * $this->bagPrice) + ($this->shoes * $this->shoesPrice);
        if($this->price >= 15000)
        {
            $this->price = ($this->price - ($this->price/100)*15);
            return $this->brand . ": " . $this->price;
        }
        return $this->brand . ": " . $this->price;
    }
}
$productMustHave = new Product("MustHave");
$productMustHave->bag = rand(1, 3);
$productMustHave->bagPrice = 1000;
$productMustHave->shoes = rand(1,3);
$productMustHave->shoessPrice = 2000;
echo $productMustHave->getProducts() . PHP_EOL;
echo "<br>";
$productEcco = new Product("Ecco");
$productEcco->bag = rand(1, 3);
$productEcco->bagPrice = 5000;
$productEcco->shoes = rand(1, 3);
$productEcco->shoesPrice = 10000;
echo $productEcco->getProducts() . PHP_EOL;
echo "<br>";
?>
 <!doctype html>
 <html lang = "ru">
 <head>
   <meta charset="utf-8">
   <title>3.2. Наследование и интерфейсы</title>
 </head>
 <body>
   <p><strong>Полиморфизм</strong> - множественное разное поведение дочерних классов (полиморфизм подтипов).
     Возможность переопределения методов при наследовании, и, как следствие, получение разного поведения классов-потомков.</p>
   <p><strong>Наследование</strong> - механизм, который позволяет перенимать методы и свойства от родительского класса - потомкам
   без дублировани кода. Это позволяет избежать ошибок при переопределении метода или свойства, когда это нужно сделать у всего дерева
   (исключается возможность опечатки, не пропустим какой-то один из классов).</p>
   <p><strong>Отличие интерфейсов от абстрактных классов: </strong></p>
   <br>
   <p>Интерфейс - это предварительная структура, стандарт, по которому в дальнейшем
     будет строиться код. Интерфейс удобно использовать в больших проектах, когда в построении кода зайдействовано много разработчиков.
     Может содержать в себе только абстрактные методы и константы. Используется для проектирования, т.к. задает
     обязательные свойства и методы, которые в дальнейшем необходимо будет описать в классах, а также определяет их сигнатуру. В отличие от абстрактного класса,
     дочерний класс может имплементировать какое угодно количество интерфейсов. Это альтернатива множественному наследованию.</p>
  <p>Абстрактный класс - это некий класс, который также можно использовать для проектирования. Удобен для использования, если интерфейс избыточен.</p>
  </p>
 </body>
 </html>
