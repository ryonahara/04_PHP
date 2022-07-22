<?php
//誕生月と誕生石一覧
$birthStones = [
    'ガーネット',
    'アメジスト',
    'アクアマリン',
    'ダイヤモンド',
    'エメラルド',
    'パール',
    'ルビー',
    'ペリドット',
    'サファイア',
    'オパール',
    'トパーズ',
    'ターコイズ'
];
$month = $_POST['month'];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>誕生石</title>
</head>

<body>
    <form action="" method="post">
        <h1>誕生石</h1>
        <p><?= $month ?>月の誕生石は<?= $birthStones[$month-1] ?>です！</p>
        <p>誕生月を選んでください:
            <select name="month" id="1" value="<?= $month ?>">
                <option value="1">1月</option>
                <option value="2">2月</option>
                <option value="3">3月</option>
                <option value="4">4月</option>
                <option value="5">5月</option>
                <option value="6">6月</option>
                <option value="7">7月</option>
                <option value="8">8月</option>
                <option value="9">9月</option>
                <option value="10">10月</option>
                <option value="11">11月</option>
                <option value="12">12月</option>
            </select>
            <input type="submit" value="送信">
        </p>
    </form>
</body>

</html>
