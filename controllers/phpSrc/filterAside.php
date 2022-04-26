<?php
include('./importData.php');
$filterResult = []; 
$categories = []; 
$companies = []; 
$price = [] ; 
$result = returnData('select namecateg from categories'); 

foreach($result as $key => $element) {
    array_push($categories,$element["namecateg"]);
}

$result = returnData('select company from products'); 
foreach($result as $key => $element) {
    array_push($companies,$element["company"]);
}



$result = returnData('select min(price) as minimum from products'); 


$price["min"] = $result[0]["minimum"];



$result = returnData('select max(price) as max from products'); 


$price["max"] = $result[0]["max"];


$filterResult["categories"] = $categories ; 
$filterResult["companies"] = $companies ; 
$filterResult["price"]= $price ; 

$filterResult = [$filterResult] ;
echo json_encode($filterResult);