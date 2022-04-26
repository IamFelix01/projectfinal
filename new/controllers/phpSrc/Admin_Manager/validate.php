<?php  include "../../../modules/cnx_MySqli.php"?>

<?php
session_start();
if(isset($_GET['com_id']))
    {
      $comid = $_GET['com_id']; 
      $query = "UPDATE commands SET is_valid = 1 where idcommand = $comid";
      $validate_command = mysqli_query($conn, $query);
      
      $job = $_SESSION["login"] == 'root'?'admin':'manager';
      header("Location: ../../../viewers/Admin_Manager/Admin.php?job=$job");
    }
?>