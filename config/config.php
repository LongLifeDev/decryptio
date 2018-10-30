<?php
//Authorization Database Connection
$pdo = null;
function connect_to_auth(){
    $dbengine   = 'mysql';
    $server = 'localhost';
    $username = '';
    $password = '';
    $database = '';    
    try{
        $pdo = new PDO("".$dbengine.":host=$server; dbname=$database", $username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }  catch (PDOException $e){
                $e->getMessage();
       }
}
//Webapps Database Connection
$pdo = null;
function connect_to_db(){
    $dbengine   = 'mysql';
    $server = 'localhost';
    $username = 'root';
    $password = '123minnie';
    $appdata = 'webapps';     
    try{
        $pdo = new PDO("".$dbengine.":host=$server; dbname=$appdata", $username,$password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $pdo;
    }  catch (PDOException $e){
                $e->getMessage();
       }
}
?>