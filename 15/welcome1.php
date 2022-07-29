<?php
$lang = 'ja';
if (!empty($_POST)) {
    $lang = $_POST['lang'];
} elseif (isset($_COOKIE['lang'])) {
    //リピーター
    $lang = $_COOKIE['lang'];
}

setcookie('lang', $lang, time() + 86400 * 30);

if ($lang === 'en') {
    $message = 'Welocome！';
} elseif ($lang === 'ja') {
    $message = 'ようこそ！';
} elseif ($lang === 'kr') {
    $message = '오신 것을 환영합니다!';
} elseif ($lang === 'cn') {
    $message = '欢迎光临!';
} elseif ($lang === 'it') {
    $message = 'Benvenuto!';
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $message ?></title>
</head>

<body>

    <h1><?= $message ?></h1>
    <form action="" method="post" novalidate>
        <p>
            <select name="lang" value="<?= $lang ?>">
                <option value="en" <?= $lang == 'en' ? 'selected' : ''; ?>>英語</option>
                <option value="ja" selected <?= $lang == 'ja' ? 'selected' : ''; ?>>日本語</option>
                <option value="kr" <?= $lang == 'kr' ? 'selected' : ''; ?>>韓国語</option>
                <option value="cn" <?= $lang == 'cn' ? 'selected' : ''; ?>>中国語</option>
                <option value="it" <?= $lang == 'it' ? 'selected' : ''; ?>>イタリア語</option>
            </select>
            <input type="submit" value="送信">
        </p>
    </form>
</body>

</html>
