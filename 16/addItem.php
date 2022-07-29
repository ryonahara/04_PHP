<?php
session_start();

$_SESSION['item'] = 'テレビ';
?>
<p>商品を記録しました。</p>
<p><a href="showItem.php">記録した商品を見る</a></p>
