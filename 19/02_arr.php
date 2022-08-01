<?php
//1
$recipe = [
    ['code' => 'A0001', 'name' => '豚ロース薄切り(50g)', 'price' =>  128],
    ['code' => 'K0001', 'name' => '白菜(3枚)',          'price' =>  240],
    ['code' => 'A0002', 'name' => 'にんじん(1/5本)',     'price' =>  258],
    ['code' => 'A0003', 'name' => '水菜(1株)',          'price' =>  265],
    ['code' => 'K0002', 'name' => 'しめじ(1/2株)',      'price' =>  139],
    ['code' => 'A0004', 'name' => '九条ネギ(1本)',      'price' =>  378]
];

echo '<pre>';
print_r($recipe);
echo '</pre>';

?>

<!-- 2 -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table>
        <tr>
            <th>code</th>
            <th>name</th>
            <th>price</th>
        </tr>
        <?php for ($i = 0; $i < count($recipe); $i++): ?>
            <tr>
            <td><?=$recipe[$i]['code']?></td>
            <td><?=$recipe[$i]['name']?></td>
            <td><?=$recipe[$i]['price']?></td>
            </tr>
        <?php endfor; ?>
    </table>

    <!-- 3 -->
    <table>
    <?php foreach($recipe[0] as $key => $value):?>
    <th><?=$key?></th>
    <?php endforeach; ?>
    <?php foreach($recipe as $num):?>
        <tr>
            <td><?=$num['code']?></td>
            <td><?=$num['name']?></td>
            <td><?=$num['price']?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
