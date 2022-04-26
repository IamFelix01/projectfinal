<?php
$username = 'root' ; 
$pass = ''; 
try {
    $cnx = new PDO('mysql:host=localhost;port=3306;dbname=db_products',$username,$pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}