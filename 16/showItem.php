<?php
session_start();

$item = $_SESSION['item'];
?>
<p>保存されている商品は「<?=$item;?>」です。</p>
<p><a href="addItem.php">商品を記録する</a></p>
<p><a href="deleteItem.php">商品の記録を削除する</a></p>
