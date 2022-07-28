<?php
class Member
{
    private $name;
    private $age;
    private $address;

    /**
     * 初期値の追加
     *
     * @param string $n
     * @param integer $ag
     * @param string $ad
     */
    public function __construct(string $n, int $ag, string $ad)
    {
        $this->name    = $n;
        $this->age     = $ag;
        $this->address = $ad;
    }

    public function showInfo()
    {
        echo '<ul>';
        echo '<li>名前:' . $this->name    . '</li>';
        echo '<li>年齢:' . $this->age     . '</li>';
        echo '<li>住所:' . $this->address . '</li>';
        echo '</ul>';
    }
}
