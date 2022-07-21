<?php
//商品リスト
$goodsList = [
    'テレビ',
    'パソコン',
    '携帯電話',
    '冷蔵庫',
    '洗濯機'
];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | </title>
    <meta name="description" content="">
</head>
<body>
<h2>商品の選択</h2>
<ul></ul>
    <li><a href="goods.php?id=0&itemName=テレビ"><?=$goodsList[0]?></a></li>
    <li><a href="goods.php?id=1&itemName=パソコン"><?=$goodsList[1]?></a></li>
    <li><a href="goods.php?id=2&itemName=携帯電話"><?=$goodsList[2]?></a></li>
    <li><a href="goods.php?id=3&itemName=冷蔵庫"><?=$goodsList[3]?></a></li>
    <li><a href="goods.php?id=4&itemName=洗濯機"><?=$goodsList[4]?></a></li>
</ul>
</body>
</html>
