<?php

declare(strict_types=1);
require_once dirname(__FILE__) . '/util.inc.php';

$cars = [
    [
        'maker' => 'トヨタ',
        'model' => 'プリウス',
        'year'  => 2004,
        'price' => 1100000,
    ],
    [
        'maker' => 'ホンダ',
        'model' => 'アコード',
        'year'  => 2009,
        'price' => 2200000,
    ],
    [
        'maker' => '日産',
        'model' => 'マーチ',
        'year'  => 2003,
        'price' => 580000,
    ],
    [
        'maker' => 'ポルシェ',
        'model' => 'ボクスター',
        'year'  => 2008,
        'price' => 4500000,
    ],
    [
        'maker' => 'BMW',
        'model' => 'Z8',
        'year'  => 2002,
        'price' => 12500000,
    ]
];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>車種一覧</title>
    <style>
        table {
            border-collapse: collapse;
            width: 800px;
        }

        tr:nth-of-type(even) {
            background-color: #f6f6f6;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #eee;
        }

        td:last-child {
            text-align: right;
        }
    </style>
</head>

<body>
    <h1>車種一覧</h1>
    <table>
        <tr>
            <th>メーカー</th>
            <th>モデル</th>
            <th>年数</th>
            <th>価格</th>
        </tr>
        <?php foreach ($cars as $car) : ?>
            <tr>
                <td><?= $car['maker'] ?></td>
                <td><?= $car['model'] ?></td>
                <td><?= $car['year']. '(' . getWareki($car['year']) . ')'?></td>
                <td><?= number_format(($car['price'])) . '円' ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>

</html>
