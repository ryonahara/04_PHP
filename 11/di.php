<?php

/**
 * 不快指数を計算する
 */

$t = 29;   // 気温 T
$h = 70;   // 湿度 H

/**
 * 温度と湿度を指定すると不快指数の数値を返す
 *
 * @param integer $t
 * @param integer $h
 * @return float|null
 */
function getDi(?int $t = '', ?int $h = ''):?float
{
    if (empty($t) || empty($t)) {
        return null;
    }
    //不快指数の計算
    return 0.81 * $t + 0.01 * $h * (0.99 * $t - 14.3) + 46.3;
}
?>


<html>

気温<?= $t ?>℃、湿度<?= $h ?>%の時の不快指数は<?= getDi($t, $h) ?>です。

</html>
