<?php
$prices = [298, 129, 198, 274, 625, 273, 296, 325, 200, 127, 398];
// 3,457円(3143 + 314(10%))

echo number_format(getPriceInTax($prices, 10)) . '円';

/**
 * 購入商品価格の配列を指定すると
 * 10%の税込み価格を返す
 *
 * @param array|null $prices
 * @param integer|null $tax
 * @return integer|null
 */
function getPriceInTax(?array $prices, ?int $tax = 8):?int
{
    $total = 0;
    if (empty($prices)) {
        return null;
    }
    foreach ($prices as $arr){
        $total += $arr;
    }
    //税込価格を戻り値として返す
    return floor($total * (1 + $tax / 100));
}
