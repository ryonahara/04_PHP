<?php

declare(strict_types=1);
require_once dirname(__FILE__) . '/db.inc.php';
$name = '';
$message = '';
$isVaildated = false;
try {
    $pdo = dbConnect();

    if (!empty($_POST)) {
        $name = $_POST['name'];
        $message = $_POST['message'];
        $isVaildated = true;

        //バリデーション
        if (empty($name)) {
            $nameError = 'なまえを入力してください';
            $isVaildated = false;
        } elseif (mb_strlen($name, 'utf8') > 10) {
            $nameError = 'なまえは10文字以内にしてください';
            $isVaildated = false;
        } else {
            //DO NOTHING
        }

        if (empty($message)) {
            $msgError = 'メッセージを入力してください';
            $isVaildated = false;
        }

        if ($isVaildated == true) {
            //DBに登録
            $sqlPre = 'INSERT INTO posts (name, message, created_at) VALUES (:name, :message, NOW())';
            $stmt = $pdo->prepare($sqlPre);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':message', $message, PDO::PARAM_STR);
            $stmt->execute();
            $name = '';
            $message = '';
        }
    }


    //全情報を取得
    $sql = 'SELECT * FROM posts ORDER BY created_at DESC LIMIT 10';
    $posts = $pdo->query($sql)->fetchAll();
} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <title>ひとこと掲示板</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 class="logo"><span class="fa-stack">
            <i class="fa fa-square fa-stack-2x"></i>
            <i class="fa fa-list-alt fa-stack-1x fa-inverse"></i>
        </span> ひとこと掲示板</h1>
    <main class="main">
        <h2 class="formtitle">メッセージの投稿</h2>
        <form action="" method="post" novalidate>
            <p>なまえ：
            <?php if (isset($nameError)):?>
                <p class="error"><?=$nameError?></p>
            <?php endif;?>
                <input type="text" name="name" value="<?= h($name) ?>">
            </p>
            <?php if (isset($msgError)):?>
                <p class="error"><?=$msgError?></p>
            <?php endif;?>
            <textarea name="message" cols="60" rows="12" value=<?= h($message) ?>></textarea>
            <p><input type="submit" value="送信"></p>
        </form>
        <article class="post">
            <?php foreach ($posts as $post) : ?>
                <h2 class="title"><i class="fa fa-user-circle-o"></i> <?= $post['name'] ?>
                    <span class="date">[<i class="fa fa-calendar"></i> <?= date('Y年n月j日', strtotime($post['created_at'])) ?>]
                    </span>
                </h2>
                <p class="message"><?= $post['message'] ?></p>
            <?php endforeach; ?>
        </article>
    </main>
</body>

</html>
