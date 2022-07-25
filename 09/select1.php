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
                <option <?php if($item == 'リンゴ') echo 'selected'; ?>>リンゴ</option>
                <option <?php if($item == 'バナナ') echo 'selected'; ?>>バナナ</option>
                <option <?php if($item == 'ぶどう') echo 'selected'; ?>>ぶどう</option>
            </select>
        </p>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>
