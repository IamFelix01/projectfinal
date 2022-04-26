<?php  include "../header.php" ?>

<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset( $_SESSION['login'])){
    header("Location: login.php");
    exit(); 
  }
?>
<?php  include "../header.php" ?>
    <div class="sucess">
    <h1>Bienvenue <?php echo  $_SESSION['login']; ?>!</h1>
    <a href="logout.php">Déconnexion</a>
    </div>
  </body>
</html>