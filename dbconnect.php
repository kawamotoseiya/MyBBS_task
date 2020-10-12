<?php 
    try{
        $db = new PDO('mysql:dbname=mybbs;host=localhost;charset=utf8','root','root');
        }catch(PDOException $e){
            echo "エラー:".$e->getMessage();
        }
?>