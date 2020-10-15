<?php 
        $db = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
        $db['dbname'] = ltrim($db['path'], '/');
        $dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $user = $db['user'];
        $password = $db['pass'];
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true,
          );
    try{
        $dbh = new PDO($dsn,$user,$password,$options);
        }catch(PDOException $e){
            echo "エラー:".$e->getMessage();
        }
?>