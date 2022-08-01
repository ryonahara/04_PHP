<?php
const IMGS_PATH = 'images/';
if (!empty($_FILES)) {
    if ($_FILES['userfile']['error'] == UPLOAD_ERR_OK) {
        $name = basename($_FILES['userfile']['name']);
        $name = mb_convert_encoding($name, 'cp932', 'utf8');
        $temp = $_FILES['userfile']['tmp_name'];
        $result = move_uploaded_file($temp, IMGS_PATH . $name);
        if ($result == true) {
            $message = 'ファイルをアップロードしました';
        } else {
            $message = 'tmpからimagesへのファイル移動に失敗しました';
        }
    } elseif ($_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE) {
        $message = 'ファイルのアップロードは空送信です';
    } else {
        $message = 'ファイルのアップロードはシステムエラーです';
    }
}
$files = glob('images/*.jpg');
$replace = ['images/', '.jpg'];
?>
<html>
<!-- 省略 -->
<title>アップロードテスト</title>

<body>
    <h1>アップロードテスト</h1>
    <?php if (isset($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <p>ファイル：<input type="file" name="userfile" accept="images/*"></p>
        <p><input type="submit" value="送信"></p>
    </form>
    <!-- もし画像が1件以上登録されていれば -->
    <?php if (0 < count($files)) : ?>
        <!-- 以下でも可能 -->
        <!--<?php /* if (file_exists('images')): */ ?> -->
        <table>
            <tr>
                <th colspan="4">画像一覧</th>
            </tr>
            <tr>
                <!-- 取得した配列(画像数)分だけ繰り替えし(foreachも可) -->
                <?php for ($i = 0; $i < count($files); $i++) : ?>
                    <?php
                    // ファイル名だけに置換
                    $file = str_replace($replace, '', $files[$i]);
                    // ブラウザ用に文字コードを変換
                    $file = mb_convert_encoding($file, 'utf8', 'cp932');
                    ?>
                    <!-- 4つ目の画像(余りが3)のときだけ -->
                    <?php if (($i % 4) == 3) : ?>
                        <!-- テーブル行を終了し、また始める(改行) -->
                        <td><img src="images/<?= $file ?>.jpg" alt="<?= $file ?>" width="100"></td>
            </tr>
            <tr>
            <?php else : ?>
                <td><img src="images/<?= $file ?>.jpg" alt="<?= $file ?>" width="100"></td>
            <?php endif; ?>
        <?php endfor; ?>
            </tr>
        </table>
    <?php else : ?>
        <table>
            <tr>
                <th>画像一覧</th>
            </tr>
            <tr>
                <td>ファイルをアップロードしてください</td>
            </tr>
        </table>
    <?php endif; ?>
</body>

</html>
