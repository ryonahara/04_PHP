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
                <option <?= $item == 'メロン' ? 'selected' : ''; ?>>メロン</option>
                <option <?= $item == 'みかん' ? 'selected' : ''; ?>>みかん</option>
                <option <?= $item == 'レモン' ? 'selected' : ''; ?>>レモン</option>
                <option <?php switch ($item) {case 'キウイ' : echo 'selected';} ?>>キウイ</option>
                <option <?php switch ($item) {case 'いちご' : echo 'selected';} ?>>いちご</option>
                <option <?php switch ($item) {case 'スイカ' : echo 'selected';} ?>>スイカ</option>
            </select>
        </p>
        <p><input type="submit" value="送信"></p>
    </form>
</body>

</html>
