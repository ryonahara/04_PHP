<?php

//1
$total = 0;
for ($i = 1; $i <= 30; $i++) {
    $total += $i;
}
echo '合計は' . $total . 'です<br>';

//2
$arrNums = [];
for ($j = 1; $j <= 100; $j++) {
    $arrNums[$j] = $j;
}

//3
$total2 = 0;
foreach ($arrNums as $num) {
    $total2 += $num;
}
echo '配列の合計は' . $total2 . 'です<br>';
