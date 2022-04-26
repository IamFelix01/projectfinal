<?php  include "../header.php" ?>

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
      header("Location: index.php");
  }else{
    $errors[] = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>

<h1 class="text-center">Login page</h1>

<?php if (!empty($errors)){ ?>
  <div class ="alert alert-danger">
    <?php foreach($errors as $error){?>
      <div><?php echo $error ?></div>
    <?php } ?>
  </div>
<?php } ?>

  <div class="container">
    <form action="" method="post">
      <div class="form-group">
        <input type="text" name="login"  class="form-control" placeholder="Login"">
      </div>

      <div class="form-group">
        <input type="password" name="pass"  class="form-control" placeholder="Password"">
      </div>

      <div class="form-group">
        <input type="submit"  name="connect" class="btn btn-primary mt-2" value="Connect">
      </div>
    </form> 
  </div>

   <!-- a BACK button to go to the home page -->
  <div class="container text-center mt-5">
    <a href="login.php" class="btn btn-warning mt-5"> Connect </a>
  <div>
