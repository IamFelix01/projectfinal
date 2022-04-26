<?php include "../../modules/cnx_MySqli.php" ?>
<?php
session_start();

if(isset($_POST['connect']))
{
    $login = $_POST['login'];
    $pass = $_POST['pass'];

    $query_pass= "SELECT * FROM clients WHERE login='$login' and password='$pass'";
    $result = mysqli_query($conn,$query_pass);
    $row = mysqli_fetch_assoc($result);
    $rows = mysqli_num_rows($result);
    // $verify = password_verify($pass, $row['password']);
    // echo $verify;
    // exit;
  if($rows == 1){
      $_SESSION['login'] = $login;
      $_SESSION['id'] = $row['idclient'];

      header("Location: ../../viewers/index.php?status=1");
  }else{
    $error = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    header("Location: ../../viewers/sign-in.php?error=1");
  }
}
?>
