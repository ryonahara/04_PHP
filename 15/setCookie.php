<?php
setcookie('item', 'テレビ', time() + 86400 * 2);
setcookie('price', 100000, time() + 10);
?>
<p>ショッピングカートに商品を追加しました。</p>
<p><a href="getcookie.php">カートの中身を見る</a></p>
