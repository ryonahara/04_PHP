<?php
$prices = [298, 129, 198, 274, 625, 273, 296, 325, 200, 127, 398];
// 3,457円

echo number_format(getPriceInTax($prices, 10)) . '円';

function getPriceInTax($prices, $tax = 8)
{
    $total = 0;
    foreach ($prices as $arr){
        $total += $arr;
    }
    //税込価格
    $priceInTax = $total * (1 + $tax / 100);

    //消費税
    $taxPrice = $priceInTax - $total;
    return floor($taxPrice);
}
