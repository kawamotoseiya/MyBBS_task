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
        <?php
        require('dbconnect.php');
        $statement = $db->prepare('INSERT INTO bbs SET username=?, body=?, created_at=NOW()+INTERVAL 9 HOUR');
        $statement->execute(array($_POST['username'], $_POST['body']));
        echo '投稿しました';
        ?>
        <br>
        <a href="index.php">戻る</a>
    </div>
</main>
</body>    
</html>