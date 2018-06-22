<?php
// суперкласс для всех классов
abstract class ShopGoods
{
  public abstract function Description();
  protected abstract function InStock();
  protected abstract function GetPrice();
}
//класс Машина
interface Cars
{
  public function __construct($name, $color, $price, $year, $discount);
  public function getPrice ($price, $discount);
}

class Car implements Cars
{
    public $name;
    public $color;
    public $price;
    public $year;
    public $discount;

    public function  __construct ($name, $color, $price, $year, $discount)
{
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
        $this->year = $year;
        $this->discount = $discount;
}
public function getPrice ($price, $discount)
{
    if (isset ($discount))
{
    return round($this->price-($this->price*$discount));
} else {
   return $this->price;
}
}
}
$bmw = new Car ('BMW', 'белый', '20000', '2013', '3');
$wolksvagen = new Car ('Wolksvagen', 'черный', '18000', '2014', '5');
echo $bmw->color;
echo $wolksvagen->year;

$bmw->getPrice();
$wolksvagen->getPrice();

//класс Телевизор
interface Digital
{
  public function getYear();
}

class TV implements Digital
{
  private $privateYear = 1999;

  public function getYear()
  {
    return $this->privateYear;
  }
}
$LG = new TV ();
echo $LG->getYear;
$Samsung = new TV ();
echo $Samsung->getYear;

//класс Ручка
interface Stationery
{
  public function changeColor ();
}

class Pen implements Stationery
{
  public $color = "blue";
  public static $staticDescription = "ball pen";

  public function changeColor ()
  {
    $this->color="red";
  }
}
echo Pen::$staticDescription;
$miniso = new Pen;
$pickard = new Pen;

echo $miniso->color;
$pickard->changeColor;
echo $pickard->color;

//класс Утка
interface Birds
{
  public function feathersAmount ();
}

class Duck implements Birds
{
  const COVER= "feathers";
  const AMOUNT = 1000;
  public $years;
  public function feathersAmount ()
  {
    echo 'I currently have' . Duck::AMOUNT * $this->years . 'feathers';
  }
}
class WeirdDuck extends Duck
{
  public $years = 3;
  public function showConstant ()
  {
    echo self::COVER;
  }
}
$ducky = new WeirdDuck;
$ducky->feathersAmount;
$babyDuck = new Duck;
$babyDuck->feathersAmount;
echo Duck::COVER;

//класс Продукт
interface SuperProduct
{
  public function  __construct ($name, $price);
}

class Product implements SuperProduct
{
  public $name, $price;
  public function  __construct ($name, $price)
{
      $this->name = $name;
      $this->price = $price;
}
}
$book = new Product("Три товарища.", "500");
$book->setAuthor("Э.М. Ремарк")->setPages(400)->setYear(2018);
echo $book->setAuthor;
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
