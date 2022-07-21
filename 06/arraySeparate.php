<?php
$alph = 'A-B-C';
/* A | B | C | D | 4個 */

//配列に変換
$alphArr = explode('-', $alph);

//Dを追加
array_push($alphArr, 'D');

//個数を追加
array_push($alphArr, count($alphArr));

//文字列に変換
echo implode(' | ', $alphArr) . '個';
