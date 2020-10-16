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
<h2 class="edit_title">編集</h2>
<?php
require('dbconnect.php');
date_default_timezone_set('Asia/Tokyo');
if(isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $bbses = $db->prepare('SELECT * FROM bbs WHERE id=?');
    $bbses->execute(array($id));
    $bbs= $bbses->fetch();
    
}
?>
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php print($id); ?>">
    <p>投稿者　<input name="username" type="text" size="42" value="<?php print($bbs['username']); ?>"></p>
    <p>本文</p>
    <textarea name="body" cols="50" rows="10"><?php print($bbs['body']); ?></textarea>
    <br>
    <button type="submit">更新</button>
</form>
<a href="index.php">戻る</a>
</div>
</main>
</body>    
</html>