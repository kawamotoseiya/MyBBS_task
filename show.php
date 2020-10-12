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
            $id=$_REQUEST['id'];
            if(!is_numeric($id) || $id<= 0){
                print("1以上の数字でで指定してください");
                exit();
            }
            $bbses = $db->prepare('SELECT * FROM bbs WHERE id=?');
            $bbses->execute(array($id));
            $bbs = $bbses->fetch();

        ?>
        <article>
            <h3 class="show_username">投稿者：<?php print($bbs['username']); ?></h3>
            <h3>作成日：<?php print($bbs['created_at']); ?></h3>
            <h3 class="show_body"><?php print($bbs['body']); ?></h3>
            <a href="edit.php?id=<?php print($bbs['id']); ?>">編集</a>
            |
            <a href="destroy.php?id=<?php print($bbs['id']); ?>">削除</a>
            |
            <a href="index.php">戻る</a>
        </article>
    </div>
</main>
</body>    
</html>