<?php
declare(strict_types = 1);
require_once dirname(__FILE__) . '/db.inc.php';

try {
    $pdo = dbConnect();
    $paramId = '';

    if (!empty($_GET)) {
        $paramId = $_GET['c'];

        $sql = 'SELECT a.title, a.created_at, c.name, a.article
                FROM categories c JOIN articles a
                ON a.category_id = c.id
                WHERE c.id=' . $paramId . '
                ORDER BY a.created_at DESC';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } else {
        $sql = 'SELECT a.title, a.created_at, c.name, a.article
                FROM categories c JOIN articles a
                ON a.category_id = c.id
                ORDER BY a.created_at DESC';
        $stmt = $pdo->query($sql);
    }

    $articles = $stmt->fetchAll();

    //全カテゴリを取得
    $sql = 'SELECT id, name FROM categories';
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
    <title>Taro's Blog</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header">
            <h1><a href="articles.php">Taro's Blog</a></h1>
        </header>
        <main class="main">
            <article class="article">
            <?php foreach($articles as $article): ?>
                <section class="title">
                    <h2><?=$article['title']?></h2>
                    <h3><?=$article['created_at']?> | <?=$article['name']?></h3>
                </section>
                <div class="body">
                <?=$article['article']?>
                </div>
            <?php endforeach; ?>
            </article>

        </main>
        <aside class="side">
            <nav class="sidebox">
                <h2>カテゴリ</h2>
                <ul>
                <?php foreach($categories as $category):?>
                    <li><a href="?c=<?=$category['id']?>"><?=$category['name']?></a></li>
                <?php endforeach;?>
                </ul>
            </nav>
            <p class="right"><a href="post_article.php">記事の投稿</a></p>
        </aside>
    </div>
</body>

</html>
