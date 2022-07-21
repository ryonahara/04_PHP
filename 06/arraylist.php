<?php
$fruits = ['リンゴ', 'バナナ', 'ぶどう'];
$arrayList = [
    'リンゴ' => 100,
    'バナナ' => 200,
    'ぶどう' => 300,
];

$fruits[2] = 'イチゴ';
$fruits[3] = 'メロン';

$arrayList['イチゴ'] = '400';
$arrayList['リンゴ'] = '80';

unset($fruits[1]);

echo '<pre>';
var_dump($fruits);
echo '</pre>';

echo '<pre>';
print_r($fruits);
echo '</pre>';

echo '<pre>';
print_r($arrayList);
echo '</pre>';
