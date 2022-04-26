<?php 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=db_products','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION) ; 
$request = $_GET["request"];
$statement = $pdo->prepare("$request") ; 
$statement->execute();
$products = $statement->fetchAll(pdo::FETCH_ASSOC) ; 

echo json_encode($products) ;


