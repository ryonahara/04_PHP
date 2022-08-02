<?php
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
    public function __construct(?string $maker = "BMW", ?string $customer = '私')
    {
            $this->maker = $maker;
            $this->customer = $customer;
    }

    /**
     * 乗車する人と車種のメッセージを返す
     *
     * @return void
     */
    public function rideOnCar(){
        return $this->customer . 'は' . $this->maker . 'の車に乗っています。<br>';
    }

    public function drive(){
        return 'ブロロロロー<br>';
    }
}

interface Engine
{
    public function drive();
}
