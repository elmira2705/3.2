<?php
interface carImplement
{
    public function priceCar();
}
interface tvImplement
{
    public function __construct($brand, $diagonal, $resolution);
    public function totalPrice();
}
interface penImplement
{
    public function penInfo();
}
interface duckImplement
{
    public function __construct();
    public function count_color ();
}
interface productImplement
{
    public function getProducts();
}
class oneSuper
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
echo "<br><br>";
class Car extends oneSuper implements carImplement
{
    public $color;
    public $enginePower;
    public $automatedGearbox;
    public function priceCar()
    {
        if($this->automatedGearbox == 1)
        {
            return "Цена " . $this->brand . " с АТ: " . $this->price*1.8 . "$";
        } else
            return $this->price;
    }
}
$carAudi = new Car("Audi");
$carAudi->enginePower = 6.5;
$carAudi->price = 40000;
$carAudi->automatedGearbox = 1;
echo $carAudi->priceCar() . PHP_EOL;
echo "<br>";
$carRenault = new Car("Renault");
$carRenault->price = 10000;
$carRenault->color = "Yellow";
$carRenault->enginePower = 1.6;
$carRenault->automatedGearbox = 1;
echo $carRenault->priceCar() . PHP_EOL;
echo "<br><br>";
class Tv extends oneSuper implements tvImplement
{
    public $diagonal;
    public $resolution;
    public $totalPrice;
    public function __construct($brand, $diagonal, $resolution)
    {
        parent::__construct($brand);
        $this->diagonal = $diagonal;
        $this->resolution = $resolution;
    }
    public function totalPrice()
    {
        if((strtolower(parent::getBrand()) == "Sumsung" && $this->diagonal >= 1.1 && $this->resolution == "4k") || (strtolower(parent::getBrand()) == "LG" && $this->diagonal >= 1.1 && $this->resolution == "4k"))
        {
            return  100500;
        }
        return 35000;
    }
}
$tvSumsung = new TV('Sumsung', 1.1, '4k');
$tvLg = new TV('LG', 1.1, '4k');
echo $tvSumsung->brand . "<br>";
echo $tvSumsung->totalPrice(). "<br>";
echo $tvLg->brand . "<br>";
echo $tvLg->totalPrice(). "<br>";
echo "<br><br>";
class Pen extends oneSuper implements penImplement
{
    public $color;
    public $price;
    public function penInfo()
    {
        return parent::getBrand() . ": " . $this->color . "-" . $this->price;
    }
}
$penErichKrause = new Pen("ErichKrause");
$penErichKrause->color = 'black';
$penErichKrause->price = 300;
echo $penErichKrause->penInfo() . PHP_EOL;
echo "<br>";
$penParker = new Pen("Parker");
$penParker->color = 'gold';
$penParker->price = 1000;
echo $penParker->penInfo() . PHP_EOL;
echo "<br><br>";
final class Duck implements duckImplement
{
    public static $count = 0;
    public function __construct()
    {
        self::$count++;
    }
    public function count_color()
    {
        if(self::$count <= 1)
        {
            return "Duck is white" . "<br>";
        }
        else
        {
            return "Duck is grey" . "<br>";
        }
    }
}
$duckWhite = new Duck;
echo $duckWhite->count_color() . PHP_EOL;
$duckWhite2 = new Duck;
echo $duckWhite2->count_color() . PHP_EOL;
$duckWhite3 = new Duck;
echo $duckWhite3->count_color() . PHP_EOL;
echo "<br><br>";
class Product extends oneSuper implements productImplement
{
    public $shirt;
    public $jeans;
    public $shirtPrice;
    public $jeansPrice;
    public $price;
    public function getProducts()
    {
        $this->price = ($this->shirt * $this->shirtPrice) + ($this->jeans * $this->jeansPrice);
        if($this->price >= 15000)
        {
            $this->price = ($this->price - ($this->price/100)*15);
            return $this->brand . ": " . $this->price;
        }
        return $this->brand . ": " . $this->price;
    }
}
$productMustang = new Product("Mustang");
$productMustang->shirt = rand(1, 3);
$productMustang->shirtPrice = 3000;
$productMustang->jeans = rand(1,3);
$productMustang->jeansPrice = 9000;
echo $productMustang->getProducts() . PHP_EOL;
echo "<br>";
$productLevis = new Product("Levis");
$productLevis->shirt = rand(1, 3);
$productLevis->shirtPrice = 4000;
$productLevis->jeans = rand(1, 3);
$productLevis->jeansPrice = 10000;
echo $productLevis->getProducts() . PHP_EOL;
echo "<br><br>";
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
