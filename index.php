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
<h2>BBS一覧</h2>
<a href="new.php">新規投稿</a>
<table>
<?php
require('dbconnect.php');
if (isset($_REQUEST['page']) && is_numeric($_REQUEST['page'])){
    $page = $_REQUEST['page'];
} else {
    $page=1;
}
    $start =8*($page-1);

    $mybbses = $db->prepare('SELECT * FROM bbs ORDER BY id DESC LIMIT ?, 8');
    $mybbses->bindParam(1, $start, PDO::PARAM_INT);
    $mybbses->execute();
    ?>
    
        <?php while ($mybbs = $mybbses->fetch()): ?>
        
            <tr>
                <td>[<?php print($mybbs['username']); ?>]</td>
                <td>/</td>
                <td><time>[<?php print($mybbs['created_at']); ?>]</time></td>
            </tr>
            <tr>
                <td><a href="show.php?id=<?php print($mybbs['id']);?>">[<?php print(mb_substr($mybbs['body'],0,50)); ?>]</a><hr></td>
            </tr>
        <?php endwhile; ?>
</table>
        <?php if ($page >= 2): ?>
        <a href="index.php?page=<?php print($page-1); ?>"><?php print($page-1); ?>ページ目</a>
        <?php endif; ?>
        <?php
        $counts = $db->query('SELECT COUNT(*) as cnt FROM bbs');
        $count = $counts->fetch();
        $max_page = ceil($count['cnt']/8);
        if($page < $max_page):
        ?>
        <a href="index.php?page=<?php print($page+1); ?>"><?php print ($page+1); ?>ページ目</a>
        <?php endif; ?>

</main>
</body>    
</html>