<?php 
    function dbConnect(){
        $db1 = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
        $db1['dbname'] = ltrim($db1['path'], '/');
        $dsn = "mysql:host={$db1['host']};dbname={$db1['dbname']};charset=utf8";
        $user = $db1['user'];
        $password = $db1['pass'];
        $options = array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::MYSQL_ATTR_USE_BUFFERED_QUERY =>true,
        );
        $db = new PDO($dsn,$user,$password,$options);
        return $db;
      }
?>