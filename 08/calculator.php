<?php
// $num1 = $_POST['num1'];
// $num2 = $_POST['num2'];

$num1 = '';
$num2 = '';
if (!empty($_POST)) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>計算</h1>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2><?= $num1 ?> + <?= $num2 ?> = <?= $num1 + $num2 ?></h2>
    <?php endif; ?>
    <form action="" method="post">
    <p><input type="text" name="num1" size="2" maxlength="2" value="<?=$num1?>"> +
            <input type="text" name="num2" size="2" maxlength="2" value="<?=$num2?>"> =
            <p><input type="submit" value="計算"></p>
    </form>
</body>

</html>
