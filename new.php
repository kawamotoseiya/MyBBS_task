<?php 
if(!empty($_POST)){

    if($_POST['username']==''){
        $error['username']='blank';
    }
    if($_POST['body']==''){
        $error['body']='blank';
    }
}
if (!empty($error)){
    header('Location: new.php');
      exit();
}
?>



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
<?php
require('dbconnect.php');
?>
    <div class="main_body">
        <h2 class="new_title">新規投稿</h2>
        <form action="create.php" method="post">
            <p>投稿者　<input name="username" type="text" placeholder="名前" size="42"></p>
            <?php if($error['username']==='blank'): ?>
			<p class="error">投稿者名を入力してください。</p>
			<?php endif; ?>
            <p>本文</p>
            <textarea name="body" cols="50" rows="10" placeholder="BBS本文"></textarea>
            <?php if($error['body']==='blank'): ?>
			<p class="error">本文を入力してください。</p>
			<?php endif; ?>
            <br>
            <button type="submit">投稿</button>
        </form>
        <a href="index.php">戻る</a>
    </div>
</main>
</body>    
</html>