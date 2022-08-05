<?php

declare(strict_types=1);
require_once dirname(__FILE__) . '/db.inc.php';

try {
    $pdo = dbConnect();

    $errArr['categoryName'] = '';
    $categoryName           = '';
    $isValidated            = false;

    if (!empty($_POST)) {
        $categoryName = $_POST['categoryName'];
        $isValidated  = true;

        //バリデーション
        if (empty($categoryName)) {
            $errArr['categoryName'] = 'カテゴリーを入力してください';
            $isValidated = false;
        } elseif (mb_strlen($categoryName, 'utf8') > 10) {
            $errArr['categoryName'] = 'カテゴリーは10文字以内で入力してください';
            $isValidated = false;
        }

        //DB登録
        if ($isValidated == true) {
            $sqlPre = 'INSERT INTO categories (name) VALUES (:name)';
            $stmt = $pdo->prepare($sqlPre);
            $stmt->bindValue(':name', $categoryName, PDO::PARAM_STR);
            $stmt->execute();
        }
    }

    //全カテゴリを取得
    $sql = 'SELECT * FROM categories';
    $categories = $pdo->query($sql)->fetchAll();
} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taro's Blog | カテゴリーの投稿</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>カテゴリーの投稿</h1>
        </header>
        <section class="postform">
            <p class="right"><a href="articles.php">記事の一覧に戻る</a></p>
            <?php if ($isValidated == true) : ?>
                <p>以下の内容で記事を保存しました。</p>
                <table>
                    <tr>
                        <th>カテゴリー名</th>
                        <td>
                            <?= h($categoryName) ?>
                        </td>
                    </tr>
                </table>
                <p><a href="post_article.php">続けて投稿する</a></p>
            <?php else : ?>
                <p>カテゴリーを入力し、送信ボタンを押してください。</p>
                <form action="" method="post">
                    <table>
                            <th>カテゴリー名</th>
                            <td>
                                <input type="text" name="categoryName" size="10" value="<?= h($categoryName) ?>" />
                                    <?php if (isset($errArr['categoryName'])) : ?>
                                        <span class="error"><?= $errArr['categoryName'] ?></span>
                                    <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                    <p><input type="submit" value="送信" /></p>
                </form>
            <?php endif; ?>
        </section>
    </div>
</body>

</html>
