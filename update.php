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

            if($_POST['username']==''){
                $error['username']='blank';
                echo "投稿者名が未入力です。";
            }
            if($_POST['body']==''){
                $error['body']='blank';
                echo "本文が未入力です。";
            }
            if (empty($error)){
            $statement = $db->prepare('UPDATE bbs SET username=?, body=?, created_at=NOW()+INTERVAL 9 HOUR, WHERE id=?');
            $statement->execute(array($_POST['username'], $_POST['body'], $_POST['id']));
            echo '更新しました。';
            }
        ?>
        <a href="index.php">戻る</a>
    </div>
</main>
</body>    
</html>