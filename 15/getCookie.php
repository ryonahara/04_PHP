<?php
$item = $_COOKIE['item'];
$price = $_COOKIE['price'];
?>
<table border="1">
  <tr>
    <th>商品</th>
    <th>価格</th>
  </tr>
  <tr>
    <td><?=$item?></td>
    <td><?=$price?>円</td>
  </tr>
</table>
<p><a href="setcookie.php">商品一覧に戻る</a></p>
