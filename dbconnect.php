<?php   
        
        $now_date = date('Y-m-d H:i:s', strtotime('+9hour'));
        $db1 = parse_url($_SERVER['CLEARDB_DATABASE_URL']);
        $db1['dbname'] = ltrim($db1['path'], '/');
        $dsn = "mysql:host={$db1['host']};dbname={$db1['dbname']};charset=utf8";
        $user = $db1['user'];
        $password = $db1['pass'];
        
        try{
            $db = new PDO($dsn,$user,$password);
            }catch(PDOException $e){
                echo "エラー:".$e->getMessage();
            }
?>