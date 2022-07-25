<?php
$item = 'バナナ';
if (!empty($_POST)) {
    $item = $_POST['item'];
}

?>
<html>

<body>
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
        <p><?=$item?>が選択されました。</p>
    <?php endif; ?>
    <form action="" method="post">
        <p>
            <select name="item">
                <option>リンゴ</option>
                <option selected>バナナ</option>
                <option>ぶどう</option>
            </select>
        </p>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>
