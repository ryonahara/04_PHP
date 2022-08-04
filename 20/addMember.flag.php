<?php
// 外部ファイルの読み込み
declare(strict_types=1);
require_once dirname(__FILE__) . '/db.inc.php';
require_once dirname(__FILE__) . '/util.inc.php';

// 値の初期化
$name    = '';
$age     = '';
$address = '';
$isValidated = false;

if (!empty($_POST)) {
    // 送信値の取得
    $name    = $_POST['name'];
    $age     = $_POST['age'];
    $address = $_POST['address'];
    $isValidated = true;

    //入力値判定
    if (empty($name)) {
        $nameError = '※氏名を入力してください';
        $isValidated = false;
    } elseif (mb_strlen($name, 'utf8') > 10) {
        $nameError = '※氏名10文字以内で入力してください';
        $isValidated = false;
    }
    if ($age === '' || mb_ereg_match('/^(\s|　)+$/', $age)) {
        $age = null;
        $isValidated = false;
    } elseif (!is_numeric($age) || $age < 0) {
        $ageError = '※年齢は0以上の数値を入力してください';
        $isValidated = false;
    }


    if ($isValidated == true) {
        try {
            // データ登録
            $pdo = dbConnect();
            $stmt = $pdo->prepare(
                'INSERT INTO members (name, age, address, created_at)
            VALUES(:name, :age, :address, NOW())'
            );

            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':age', (int)$age, PDO::PARAM_INT);
            $stmt->bindValue(':address', $address, PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            header('Content-Type: text/plain; charset=UTF-8', true, 500);
            exit($e->getMessage());
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員管理システム</title>
    <style>
        .error {
            color: #900;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>会員登録</h1>
    <p><a href="member.php">会員一覧に戻る</a></p>
    <?php if ($isValidated == true) : ?>
        <p>登録完了しました。</p>
    <?php else : ?>
        <form action="" method="post" novalidate>
            <p>氏名：<input type="text" name="name" value="<?= h($name) ?>">
                <?php if (isset($nameError)) : ?>
                    <span class="error"><?= $nameError ?></span>
                <?php endif; ?>
            </p>
            <p>年齢：<input type="text" name="age" value="<?= h($age) ?>"></p>
            <?php if (isset($ageError)) : ?>
                <span class="error"><?= $ageError ?></span>
            <?php endif; ?>
            <p>住所：<input type="text" name="address" value="<?= h($address) ?>"></p>
            <p><input type="submit" value="送信"></p>
        </form>
    <?php endif; ?>
</body>

</html>
