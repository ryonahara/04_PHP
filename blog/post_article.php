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

			<p>以下の内容で記事を保存しました。</p>
			<table>
				<tr>
					<th>カテゴリ</th>
					<td>
						カテゴリ1
					</td>
				</tr>
				<tr>
					<th>タイトル</th>
					<td>
						記事のタイトル
					</td>
				</tr>
				<tr>
					<th>記事</th>
					<td>
						記事のテキスト
						記事のテキスト
						記事のテキスト
						記事のテキスト
						記事のテキスト
					</td>
				</tr>
			</table>
			<p><a href="post_article.php">続けて投稿する</a></p>

			<p>記事を入力し、送信ボタンを押してください。</p>
			<form action="" method="post">
				<table>
					<tr>
						<th>カテゴリ</th>
						<td>
							<select name="category">
								<option value="1">カテゴリ1</option>
								<option value="2">カテゴリ2</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>タイトル</th>
						<td>
							<p class="error">エラーメッセージ</p>
							<input type="text" name="title" size="60" value="" />
						</td>
					</tr>
					<tr>
						<th>記事</th>
						<td>
							<p class="error">エラーメッセージ</p>
							<textarea name="article" cols="60" rows="5"></textarea>
						</td>
					</tr>
				</table>
				<p><input type="submit" value="送信" /></p>
			</form>

		</section>

	</div>
</body>

</html>