<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="css/style.css">

<title>MyBBS</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">MyBBS</h1>    
</header>

<main>
<h2>新規投稿</h2>
<form action="new_do.php" method="post">
    <p>投稿者　<input name="username" type="text" placeholder="名前"></p>
    <p>本文</p>
    <textarea name="body" cols="50" rows="10" placeholder="BBS本文"></textarea>
    <br>
    <button type="submit">投稿</button>
</form>
<a href="index.php">戻る</a>
</main>
</body>    
</html>