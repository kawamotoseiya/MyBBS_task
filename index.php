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
    <div class="index-head">
        <h2>BBS一覧</h2>
        <a href="new.php" class="new_link">新規投稿</a>
    </div>
<table>
<?php
require('dbconnect.php');

if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])){
    $page = $_REQUEST['page'];
} else {
    $page=1;
}
    $start =8*($page-1);

    $bbses = $db->prepare('SELECT * FROM bbs ORDER BY id DESC LIMIT ?, 8');
    $bbses->bindParam(1, $start, PDO::PARAM_INT);
    $bbses->execute();
    ?>
    
        <?php while ($bbs = $bbses->fetch()): ?>
        
            <tr>
                <td>[<?php print($bbs['username']); ?>]</td>
                <td>/</td>
                <td><time>[<?php print($bbs['created_at']); ?>+09:00]</time></td>
            </tr>
            <tr>
                <td colspan="12"><a href="show.php?id=<?php print($bbs['id']);?>">[<?php print(mb_substr($bbs['body'],0,50)); ?>]</a><hr></td>
            </tr>
        <?php endwhile; ?>
</table>
        <?php if ($page >= 2): ?>
            <a href="index.php?page=<?php print($page-1); ?>" class="page"><?php print($page-1); ?>ページ目</a>
        <?php endif; ?>
        <?php
        $counts = $db->query('SELECT COUNT(*) as cnt FROM bbs');
        $count = $counts->fetch();
        $max_page = ceil($count['cnt']/8);
        if($page < $max_page):
        ?>
            <a href="index.php?page=<?php print($page+1); ?>"><?php print ($page+1); ?>ページ目</a>
        <?php endif; ?>
</div>
</main>
</body>    
</html>