<?php


$server="localhost";
$username="root";
$password="";
$database="db_proof";  

try{
    $db = new PDO("mysql:=$server;dbname=$database", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connesso";
}catch(PDOException $e){
    print "Errore: ". $e->getMessage() . "<br>";
}