<?php

$pdo = new PDO(
    'mysql:host=localhost; dbname=mydb; charset=utf8',
    'sysuser',
    'secret'
  );

  $stmt = $pdo->query('SELECT * FROM members');
  $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   echo "<pre>";
//   var_dump($members);
//   echo "</pre>";

?>

  <!DOCTYPE html>
  <html lang="ja">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
  <table>
  <tr>
    <th>ID</th>
    <th>名前</th>
    <th>年齢</th>
    <th>住所</th>
    <th>日時</th>
  </tr>
  <?php foreach($members as $member): ?>
    <tr>
      <td><?=$member['id']?></td>
      <td><?=$member['name']?></td>
      <td><?=$member['age']?></td>
      <td><?=$member['address']?></td>
      <td><?=$member['created_at']?></td>
    </tr>
  <?php endforeach; ?>
</table>
  </body>
  </html>
