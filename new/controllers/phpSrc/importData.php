<?php
function returnData($sql)
{
    include('../../modules/cnx.php'); 
    try {
    $statement = $cnx->query($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
}
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result ; 
}

function insertingData($sql){
    include('../../modules/cnx.php'); 
    try {
    $statement = $cnx->query($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
}
}

