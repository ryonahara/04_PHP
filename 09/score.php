<?php
$score = '';
if (!empty($_POST)) {
    $score = $_POST['score'];
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
    <h1>テスト結果判定</h1>
    <form action="" method="post">
        <p>点数:
            <input type="text" name="score" size="3" value="<?= htmlspecialchars($score, ENT_QUOTES, 'UTF-8'); ?>">
            <input type="submit" value="判定"></p>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
        <p>判定:<?= $result ?></p>
    <?php endif; ?>
</body>

</html>
