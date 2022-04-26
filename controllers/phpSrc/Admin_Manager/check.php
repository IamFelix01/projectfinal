<?php
    
    session_start();

    $admin="http://localhost/project/viewers/Admin_Manager/Admin.php?job=admin";
    $manager="http://localhost/project/viewers/Admin_Manager/Admin.php?job=manager";
    $username=$_POST["username"];
    $passwd=$_POST["password"];

    // if($username="root" && $passwd="root"){
    //     header("Location:" . $admin);
    // }
    // else
    if ($username=="manager" && $passwd=="manager") {
        $_SESSION['login'] = 'manager';
        $_SESSION['pass'] = 'manager';
        header("Location: $manager");
        
    }
    else if($username=="root" && $passwd=="root"){
        $_SESSION['login'] = 'root';
        $_SESSION['pass'] = 'root';
        header("Location: $admin");
    }
    else{
        echo '<script> alert("This account does not exist !!!")</script>';
    }
?>

