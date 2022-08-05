<?php

declare(strict_types=1);
require_once dirname(__FILE__) . '/db.inc.php';

try {
    $pdo = dbConnect();

    $category_id       = '';
    $title             = '';
    $article           = '';
    $errArr['title']   = '';
    $errArr['article'] = '';
    $isValidated       = false;

    if (!empty($_POST)) {
        $category_id = $_POST['category'];
        $title       = $_POST['title'];
        $article     = $_POST['article'];
        $isValidated = true;

        //バリデーション
        if (empty($title)) {
            $errArr['title'] = 'タイトルを入力してください';
            $isValidated = false;
        } elseif (mb_strlen($title, 'utf8') > 100) {
            $errArr['title'] = 'タイトルは100文字以内で入力してください';
            $isValidated = false;
        }
        if (empty($article)) {
            $errArr['article'] = '記事を入力してください';
            $isValidated = false;
        }
    }

        //DB登録
    if ($isValidated == true) {
        $sqlPre = 'INSERT INTO articles (category_id, title, article)
                    VALUES(:category_id, :title, :article)';
        $stmt = $pdo->prepare($sqlPre);
        $stmt->bindValue(':category_id', (int)$category_id, PDO::PARAM_STR);
        $stmt->bindValue(':title', $title, PDO::PARAM_INT);
        $stmt->bindValue(':article', $article, PDO::PARAM_STR);
        $stmt->execute();
    }

    //全カテゴリを取得
    $sql = 'SELECT id, name FROM categories';
    $categories = $pdo->query($sql)->fetchAll();

    //DBから1行分取得
    $sql = 'SELECT c.id, a.title, a.created_at, c.name, a.article
    FROM categories c JOIN articles a
    ON a.category_id = c.id
    ORDER BY a.id DESC
    ';
    $category_once = $pdo->query($sql)->fetch();

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
    <title>Taro's Blog | 記事の投稿</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>記事の投稿</h1>
        </header>

        <section class="postform">
            <p class="right"><a href="articles.php">記事の一覧に戻る</a></p>
            <?php if ($isValidated == true) : ?>
                <p>以下の内容で記事を保存しました。</p>
                <table>
                    <tr>
                        <th>カテゴリ</th>
                        <td>
                            <?= h($category_once['name']) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>タイトル</th>
                        <td>
                            <?= h($category_once['title']) ?>
                        </td>
                    </tr>
                    <tr>
                        <th>記事</th>
                        <td>
                            <?= h($category_once['article']) ?>
                        </td>
                    </tr>
                </table>
                <p><a href="post_article.php">続けて投稿する</a></p>
            <?php else : ?>
                <p>記事を入力し、送信ボタンを押してください。</p>
                <form action="" method="post">
                    <table>
                        <tr>
                            <th>カテゴリ</th>
                            <td>
                                <select name="category" value="<?= h($category_id) ?>">
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?= $category['id'] ?>"<?= $category['id'] == $category_id ? 'selected' : ''; ?>><?= $category['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>タイトル</th>
                            <td>
                                <p class="error">
                                    <?php if (isset($errArr['title'])) : ?>
                                        <p class="error"><?= $errArr['title'] ?></p>
                                    <?php endif; ?>
                                </p>
                                <input type="text" name="title" size="60" value="<?= h($title) ?>" />
                            </td>
                        </tr>
                        <tr>
                            <th>記事</th>
                            <td>
                                <p class="error">
                                    <?php if (isset($errArr['article'])) : ?>
                                        <p class="error"><?= $errArr['article'] ?></p>
                                    <?php endif; ?>
                                </p>
                                <textarea name="article" cols="60" rows="5" value=<?= h($article) ?>></textarea>
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
