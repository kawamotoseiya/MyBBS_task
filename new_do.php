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
    <?php
    require('dbconnect.php');

    $statement = $db->prepare('INSERT INTO bbs SET username=?, body=?, created_at=NOW()');
    $statement->execute(array($_POST['username'], $_POST['body']));
    echo '投稿しました';
    ?>
    <br>
<a href="index.php">戻る</a>
</main>
</body>    
</html>