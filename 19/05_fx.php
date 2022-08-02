<?php

echo validAge('太郎', 21);
echo validAge('次郎', 18);
echo validAge('三郎');
echo validAge();

function validAge(?string $name = "名無し", ?int $age = 20): string
{
    if ($age <= 18) {
        $msg = $name . 'さんの年齢は' . $age . '歳で未成年です。<br>';
    } else {
        $msg = $name . 'さんの年齢は' . $age . '歳で成人です。<br>';
    }

    return $msg;
}
