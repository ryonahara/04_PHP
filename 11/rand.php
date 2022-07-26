<?php
$arrNum = [1490, 320, 2160, 1980, 498, 2324, 698, 2218, 1240, 198];

echo $arrNum[mt_rand(0, array_key_last($arrNum))] . '<br>';

$sum = 0;

for ($i = 0; $i < count($arrNum); $i++) {
    $index = mt_rand(0, array_key_last($arrNum));
    echo $arrNum[$index];
    if ($i <  count($arrNum) - 1) {
        echo ' | ';
    } else {
        echo '<br>';
    }
    $sum += $arrNum[$index];
}
$ave = $sum / count($arrNum);
echo $ave . '<br>';

echo number_format($ave) . '円';
