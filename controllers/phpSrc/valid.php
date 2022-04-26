<?php 
include('./importData.php');
session_start(); 


   



$products = $_GET["command"]; 
echo "<pre>" ; 
var_dump(json_decode($products));
echo "</pre>" ; 

$products = json_decode($products);
 if(!isset($_SESSION["login"])){
    header('location: ../../viewers/sign-in.php');
}
else{
    if(count($products) > 0){
         $_SESSION["stock-error"] = [];
        $idclient = $_SESSION["id"];
        $date =  date('Y-m-d H:i:s');
        $sql = "insert into commands ( date , idclient , is_valid ) values( '{$date}' , '{$idclient}' , 0)";
        insertingData($sql);
        $idcommande = returnData("select idcommand from commands order by date desc LIMIT 1");
        $idcommande = $idcommande[0]["idcommand"];
        $status = "";
        foreach($products as $product){
        $idproduct = $product->idproduct; 
        $quantity = $product->amount;
        $name = $product->name;  
        $stock = returnData("select stock from products where idproduct = $idproduct");
        $stock = $stock[0]["stock"]; 
        if($stock < $quantity){
            array_push($_SESSION["stock-error"], " sorry we can't provide more than $stock of the product $name ");
            $status = "failed"; 
        }
        else{
            $sql = "insert into lignecommandes (idcommande , idproduct , quantity) values ('{$idcommande}','{$idproduct}','{$quantity}')";
            insertingData($sql);
            $sql = "update products set stock = stock - $quantity where idproduct = $idproduct"; 
            insertingData($sql);
        }
    }
        
        if(count($_SESSION["stock-error"]) == 0){
            $_SESSION["succes"] = "your command is succefully done"; 
            unset($_SESSION["stock-error"]);
        }
        
        if($status=="failed"){
          header('location: ../../viewers/index.php?status=failed');  
        }
        else{
            header('location: ../../viewers/index.php?status=succes');   
        }
        
    }
    
    else{
        header('location: ../../viewers/index.php');
    }
}
    

    
    