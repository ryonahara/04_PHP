<?php
$prices = [298, 129, 198, 274, 625, 273, 296, 325, 200, 127, 398];
// 3,457円(3143 + 314(10%))

echo number_format(getPriceInTax($prices, 10)) . '円';

function getPriceInTax($prices, $tax = 8)
{
    $total = 0;
    foreach ($prices as $arr){
        $total += $arr;
    }
    //税込価格を戻り値として返す
    return floor($total * (1 + $tax / 100));
}
