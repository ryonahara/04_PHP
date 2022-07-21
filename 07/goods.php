<?php
//商品リスト
$goodsList = [
    'テレビ',
    'パソコン',
    '携帯電話',
    '冷蔵庫',
    '洗濯機',
];

// 商品のIDを取得する
$id = $_GET['id'];

//商品の特定
$itemName = $goodsList[$id];
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
    <p><?= $itemName ?>が選択されました</p>
    <p><a href="lists.php">一覧ページに戻る</a></p>
</body>
</html>
