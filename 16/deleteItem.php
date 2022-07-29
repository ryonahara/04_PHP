<?php
session_start();

/* 前回と同じだが部分的に省略 */
$_SESSION = [];
$p = session_get_cookie_params();
setcookie(
    'PHPSESSID',
    '',
    time() - 1,
    $p['path'],
    $p['domain'],
    $p['secure'],
    $p['httponly']
);
session_destroy();
?>
<p>セッションを破棄しました</p>
<p><a href="addItem.php">商品を記録する</a></p>
<p><a href="showItem.php">記録した商品を見る</a></p>
