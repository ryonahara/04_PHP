<?php
interface Engine
{
    public function drive();
}

class Cars implements Engine
{
    private $maker;
    private $customer;

    /**
     * 乗車する人と車種をプロパティに追加
     *
     * @param string|null $maker
     * @param string|null $customer
     */
    public function __construct(?string $m = "BMW", ?string $c = '私')
    {
            $this->maker = $m;
            $this->customer = $c;
    }

    /**
     * 乗車する人と車種のメッセージを返す
     *
     * @return void
     */
    public function rideOnCar(){
        return $this->customer . 'は' . $this->maker . 'の車に乗っています。<br>';
    }

    /**
     * 運転時のエンジン音を返す
     *
     * @return void
     */
    public function drive(){
        return 'ブロロロロー<br>';
    }
}
