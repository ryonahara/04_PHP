<?php
$score = '';
if (!empty($_POST)) {
    $score = $_POST['score'];
}
$result = '';

if (!is_numeric($score)) {
    $result =  '数値を入力してください';
} elseif (0 > $score || $score > 100) {
    $result =  '不正な点数です';
} else {
    if ($score == 100) {
        $result =  '満点おめでとう！';
    } elseif ($score >= 80) {
        $result =  '素晴らしいです！';
    } elseif ($score >= 60) {
        $result =  '合格です';
    } else {
        $result =  '不合格です';
    }
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
    <form action="" method="post">
        <p><input type="text" name="score" value="<?= htmlspecialchars($score, ENT_QUOTES, 'UTF-8'); ?>"></p>
        <p><input type="submit" value="送信"></p>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
        <p><?= $result ?></p>
    <?php endif; ?>
</body>

</html>
