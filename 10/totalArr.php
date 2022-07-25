<?php
$priceList = [298, 348, 198, 680, 98, 980, 498, 640];
$total = 0;

for ($i = 0; $i < count($priceList); $i++) {
    $total += $priceList[$i];
}
echo $total * 1.1 . '円';
