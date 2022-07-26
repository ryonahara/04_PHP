<?php
$numArr = [
    [30, 65, 72, 47, 63, 96],
    [35, 57, 67, 23, 14, 56, 61],
    [46, 16, 27, 58],
    [84, 27, 40, 18, 92, 46, 21],
    [14, 74, 54, 2, 85]
];
$num = '';
$arr = '';
$result = '';
$total = 0;

if (!empty($_POST)) {
    $arr = $_POST['arr'];
    $num = $_POST['num'];
    if (!is_numeric($num)) {
        $result =  '数値を入力してください';
    } elseif (!(1 <= $num && $num <= 99)) {
        $result =  '1から99までの数値を入力してください';
    } else {
        for ($i = 0; $i < count($numArr[$arr]); $i++) {
            $total += $numArr[$arr][$i];
        }
        $result = $total * $num;
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>合計値の計算</title>
</head>

<body>
    <form action="" method="post">
        <h1>合計値の計算</h1>
        <p>配列の選択：
            <select name="arr" value="<?= $arr ?>">
                <option value="0" <?= $arr == '0' ? 'selected' : ''; ?>>配列1</option>
                <option value="1" <?= $arr == '1' ? 'selected' : ''; ?>>配列2</option>
                <option value="2" <?= $arr == '2' ? 'selected' : ''; ?>>配列3</option>
                <option value="3" <?= $arr == '3' ? 'selected' : ''; ?>>配列4</option>
                <option value="4" <?= $arr == '4' ? 'selected' : ''; ?>>配列5</option>
            </select>
        </p>
        <p>掛ける数値：
            <input type="text" name="num" size="2" value="<?= htmlspecialchars($num, ENT_QUOTES, 'UTF-8'); ?>"></p>
        <p><input type="submit" value="計算"></p>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
        <p>合計結果:<?= $result ?></p>
    <?php endif; ?>
</body>

</html>
