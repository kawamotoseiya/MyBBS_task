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
    <h1>MyBBS</h1>    
</header>

<main>
    <div class="main_body">
        <h2 class="new_title">新規投稿</h2>
        <form action="create.php" method="post">
            <p>投稿者　<input name="username" type="text" placeholder="名前" size="42"></p>
            <p>本文</p>
            <textarea name="body" cols="50" rows="10" placeholder="BBS本文"></textarea>
            <br>
            <button type="submit">投稿</button>
        </form>
        <a href="index.php">戻る</a>
    </div>
</main>
</body>    
</html>