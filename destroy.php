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
            $id = $_REQUEST['id'];
            if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
            
                $id = $_REQUEST['id'];
                $statement = $db->prepare('DELETE FROM bbs WHERE id=?');
                $statement->execute(array($id));
            }
        ?>
        <p　class="destroy_comment">削除しました</p>
        <a href="index.php">戻る</a>
    </div>
</main>
</body>    
</html>