<?php
session_start();


// セッション変数を持っており、かつ承認済みであれば
if (!empty($_SESSION) && $_SESSION['authenticated'] == true) {
    header('Location: member.php'); // 会員ページに移動
    exit;
}

$user = '';
$pass = '';

if (!empty($_POST)) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if ($user === 'taro' && $pass === 'abcd') {
        $_SESSION['authenticated'] = true;
        $_SESSION['userId'] = $user;
        header('Location: member.php'); // 会員ページに移動
        exit;
    } else {
        $Error = 'ユーザIDかパスワードが正しくありません';
    }
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
    <title>ログイン</title>
    <style>
        .error {
            color: #f00;
        }
    </style>
</head>

<body>
    <h1>ログイン</h1>
<?php if (isset($Error)):?>
    <p class="error"><?=$Error?></p>
<?php endif;?>
    <p>ユーザIDとパスワードを入力して「ログイン」ボタンを押してください</p>
    <form action="" method="post" novalidate>
        <table>
            <tr>
                <td>
                    ユーザID
                </td>
                <td>
                    <input type="text" name="user" value="<?= h($user) ?>">
                </td>
            </tr>
            <tr>
                <td>
                    パスワード
                </td>
                <td>
                    <input type="text" name="pass" value="<?= h($pass) ?>">
                </td>
            </tr>
        </table>
        <p><input type="submit" value="ログイン"></p>
    </form>


</body>

</html>
