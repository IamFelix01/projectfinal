<?php  include "../../../modules/cnx_MySqli.php"?>

<?php 

    session_start();
     if(isset($_GET['delete']))
     {
         $prodid= $_GET['delete'];

         // SQL query to delete data from user table where id = $userid
         $query = "DELETE FROM products WHERE idproduct = {$prodid}"; 
         $delete_query= mysqli_query($conn, $query);

         $job = $_SESSION["login"] == 'root'?'admin':'manager';
         header("Location: ../../../viewers/Admin_Manager/Admin.php?job=$job");
     }
?>
