<?php
// 4つの値を受け取る
$user     = $_POST['user'];
$id         = $_POST['id'];
$pass     = $_POST['pass'];
$gender = $_POST['gender'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?= $user ?>さん、こんにちは！</h1>
    <p>あなたのパスワードは「<?= $pass ?>」です。</p>
    <p>ID: <?= $id ?></p>
    <p>性別: <?= $gender ?></p>
    <p><a href="input01.php">フォームに戻る</a></p>
</body>

</html>
