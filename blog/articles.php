<?php
declare(strict_types = 1);
require_once dirname(__FILE__) . '/env.php';

$pdo = new PDO(
    'mysql:host=localhost; dbname=blog; charset=utf8',
    'sysuser',
    'secret'
);

$stmt = $pdo->query('
  SELECT a.title, a.created_at, c.name, a.article
  From categories c JOIN articles a
  ON a.category_id = c.id
  ORDER BY a.created_at DESC
  ;
  ');

$members = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
            <?php foreach($members as $member): ?>
                <section class="title">
                    <h2><?=$member['title']?></h2>
                    <h3><?=$member['created_at']?> | <?=$member['name']?></h3>
                </section>
                <div class="body">
                <?=$member['article']?>
                </div>
            <?endforeach; ?>
            </article>

        </main>
        <aside class="side">
            <nav class="sidebox">
                <h2>カテゴリ</h2>
                <ul>
                    <li><a href="?c=1">カテゴリ1</a></li>
                    <li><a href="?c=2">カテゴリ2</a></li>
                </ul>
            </nav>
            <p class="right"><a href="post_article.php">記事の投稿</a></p>
        </aside>
    </div>
</body>

</html>
