<?php
$alph = 'A-B-C';
/* A | B | C | D | 4個 */

//配列に変換
$alpfArr = explode('-', $alph);

//Dを追加
array_push($alpfArr, 'D');

//個数を追加
array_push($alpfArr, count($alpfArr));

//文字列に変換
echo implode(' | ', $alpfArr) . '個';
