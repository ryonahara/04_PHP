<?php
declare(strict_types=1);
require_once dirname(__FILE__) . '/db.inc.php';

try {
    $pdo = dbConnect();

    $isValidated = false;

    if (!empty($_GET)) {
        $deleteId = $_GET['d'];
        $sql = 'SELECT a.title, c.name, a.article, a.id
        FROM categories c JOIN articles a
        ON a.category_id = c.id
        WHERE a.id=' . $deleteId;
        $stmt = $pdo->query($sql);
        $stmt->execute();
        $article = $stmt->fetch();
    } else {
        header('Location: article.php'); //一覧へ強制移動
        exit; //保険として強制終了
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $isValidated  = true;
        //選択したレコードを削除
        $sqlDel = 'DELETE FROM articles WHERE id=' . $deleteId;
        $pdo->query($sqlDel);
    }
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
    <title>Taro's Blog | 記事の削除</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>記事の削除</h1>
        </header>
        <section class="postform">
            <p class="right"><a href="articles.php">記事の一覧に戻る</a></p>
            <?php if ($isValidated == false) : ?>
                <p>内容に問題なければ削除ボタンを押してください</p>
                <table>
                    <tr>
                        <th>カテゴリ</th>
                        <td>
                            <?= h($article['name']) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>タイトル</th>
                        <td>
                            <?= h($article['title']) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>記事</th>
                        <td>
                            <?= h(nl2br($article['article'])) ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="" method="post" novalidate>
                                <p><input type="submit" value="削除"></p>
                            </form>
                        </td>
                    </tr>
                </table>
            <?php else : ?>
                <p>削除を完了しました。</p>
            <?php endif; ?>
        </section>
    </div>
</body>

</html>
