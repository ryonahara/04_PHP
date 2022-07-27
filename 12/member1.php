<?php
class Member
{
    public $name;
    public $age;
    public $address;

    public function showInfo()
    {
        echo '<ul>';
        echo '<li>名前:' . $this->name    . '</li>';
        echo '<li>年齢:' . $this->age     . '</li>';
        echo '<li>住所:' . $this->address . '</li>';
        echo '</ul>';
    }
}

$m1 = new Member();
$m1->name = '山田太郎';
$m1->age = 21;
$m1->address = '東京都';

$m2 = new Member();
$m2->name = '鈴木次郎';
$m2->age = 34;
$m2->address = '大阪府';

$m1->showInfo();
$m2->showInfo();
