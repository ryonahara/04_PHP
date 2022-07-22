<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="input02.php" method="post">
        <p><input type="hidden" name="id" value="1234"></p>
        <p>ユーザ名：<input type="text" name="user"></p>
        <p>パスワード：<input type="password" name="pass"></p>
        <p>
            性別：<input type="radio" name="gender" value=" 男性">男性
            <input type="radio" name="gender" value=" 女性">女性
        </p>
        <p><input type="submit" value="送信"><a href="input02.php?id=0"></a></p>
    </form>
</body>

</html>
