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
        if($_POST['comment']==''){
            $error['commetn']='blank';
            echo "コメントが未入力です。";
        }
        $bbs_id=$_POST['bbs_id'];
        
        if (empty($error)){
        $statement = $db->prepare('INSERT INTO comments SET bbs_id=?, comment=?, created_at=NOW()+INTERVAL 9 HOUR');
        $statement->execute(array($_POST['bbs_id'], $_POST['comment']));
        echo 'コメントしました';
        }
        ?>
        <a href="show.php?id=<?php print($bbs_id) ?>">戻る</a>
    </div>
</main>
</body>    
</html>