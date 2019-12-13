<?php

interface Base
{
    public function checkAge($age);
    public function calcPrice($km, $time, $age, $dop = false);
    public function getPrice();
}

abstract class Tarif implements Base
{
    const PRCIBYKM = 0;
    const PRICEBYMIN = 0;
    protected $sum = 0;
    use DopsTrait;

    public function checkAge($age)
    {
        if ($age < 18) {
            return false;
        }
        if ($age <= 21) {
            return 1.1;
        }
            return 1;
    }

    public function calcPrice($km, $time, $age, $dop = [])
    {
        $dops = 0;

        if ($dop) {
            if(in_array('gps', $dop)) {
                $dops += $this->gps($time);
            }
            if(in_array('voditel', $dop)) {
                $dops += Tarif::dopVoditel();
            }
        }

        if ($rate = $this->checkAge($age)) {

            $this->sum = $rate * ($km * $this::PRCIBYKM + $time * $this::PRICEBYMIN) + $dops;
        }
    }

    public function getPrice()
    {
        if ($this->sum) {
            return $this->sum;
        }
        return 'Не верные условия';
    }
}

class BaseTarif extends Tarif
{
    const PRCIBYKM = 10;
    const PRICEBYMIN = 3;
    
    public function __construct($km, $time, $age, $dop = false)
    {
        if (($key = array_search('voditel', $dop)) !== false) {
            unset($dop[$key]);
        }
        $class = get_class($this);
        $this->calcPrice($km, $time, $age, $dop);
    }

}

class ChasovoiTarif extends Tarif
{
    const PRCIBYKM = 0;
    const PRICEBYMIN = 200;

    public function __construct($km, $time, $age, $dop = false)
    {
        if ($time < 60) {
            $time = 60;
        }
        $class = get_class($this);
        $this->calcPrice($km, $time, $age, $dop);
    }
}

class SutochniyiTarif extends Tarif
{
    const PRCIBYKM = 1;
    const PRICEBY24HOURS = 1000;
    use DopsTrait;

    public function __construct($km, $time, $age, $dop = false)
    {
        $this->calcPrice($km, $time, $age, $dop);
    }

    public function calcPrice($km, $time, $age, $dop = false)
    {
        $dops = 0;

        if ($dop) {
            if(in_array('gps', $dop)) {

                $dops += $this->gps($time * 60);
            }
            if(in_array('voditel', $dop)) {
                $dops += $this->dopVoditel();
            }
        }

        if ($rate = $this->checkAge($age)) {

            $this->sum = $rate * ($km * $this::PRCIBYKM + round($time) * $this::PRICEBY24HOURS);
        }
    }
}

class StudentTarif extends Tarif
{
    const PRCIBYKM = 4;
    const PRICEBYMIN = 1;


    public function __construct($km, $time, $age, $dop = false)
    {
        if ($age < 26) {
            if(($key = array_search('voditel', $dop)) !== FALSE){
                unset($dop[$key]);
            }
            $class = get_class($this);
            $this->calcPrice($km, $time, $age, $dop);
        } else {
            $this->sum = 0;
        }

    }
}

trait DopsTrait
{
    /*
     * Gps в салон - 15 рублей в час, минимум 1 час. Округление в большую сторону. Доступно на всех тарифах
Дополнительный водитель - 100 рублей единоразово, доступен на всех тарифах кроме базового и студенческого
     */
    function gps($time)
    {
        $sum = ceil($time / 60) * 15;
        return $sum;
    }

    function dopVoditel()
    {
        return 100;
    }
}


$base = new BaseTarif(5, 60, 22, ['gps', 'voditel']);
echo $base->getPrice();
echo '<br>';

$chas = new ChasovoiTarif(50, 70, 22, ['voditel']);
echo $chas->getPrice();

echo '<br>';
$day = new SutochniyiTarif(50, 1.5, 18);
echo $day->getPrice();

echo '<br>';
$student = new StudentTarif(50, 90, 21, ['gps', 'voditel']);
echo $student->getPrice();

