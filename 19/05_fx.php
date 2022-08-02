<?php

echo validAge('太郎', 21);
echo validAge('次郎', 18);
echo validAge('三郎');
echo validAge();

/**
 * 名前と年齢を入力し、成人判定結果を出力する。
 *
 * @param string|null $name
 * @param integer|null $age
 * @return string
 */
function validAge(?string $name = "名無し", ?int $age = 20): string
{
    if ($age <= 18) {
        return $name . 'さんの年齢は' . $age . '歳で未成年です。<br>';
    } else {
        return $name . 'さんの年齢は' . $age . '歳で成人です。<br>';
    }
}
