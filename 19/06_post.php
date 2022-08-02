<?php

$name  = '';
$age   = '';
$email = '';
if (!empty($_POST)) {
    $name  = $_POST['name'];
    $age   = $_POST['age'];
    $email = $_POST['email'];
}

/**
 * XSS対策の参照名省略
 *
 * @param string string
 * @return string
 *
 */
function h(?string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>フォーム</title>
</head>
<body>
    <h1>フォーム</h1>

    <form action="" method="post" novalidate>
        <p>名前：<input type="text" name="name" size="10" value="<?=h($name)?>"></p>
        <p>年齢：<input type="text" name="age" size="3" maxlength="3" value="<?=h($age)?>"></p>
        <p>メール<input type="email" name="email" value="<?=h($email)?>"></p>
        <p><input type="submit" value="送信"></p>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <table>
            <tr>
                <th>名前</th>
                <th>年齢</th>
                <th>メール</th>
            </tr>
            <tr>
                <td><?=h($name)?></td>
                <td><?=h($age)?></td>
                <td><?=h($email)?></td>
            </tr>
        </table>
    <?php endif; ?>
</body>
</html>
