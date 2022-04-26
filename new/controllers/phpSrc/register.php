<?php include "../../modules/cnx_MySqli.php" ?>
<?php 


  $errors = [];
  $lastname = '';
  $firstname = '';
  $login = '';
  $pass = '';
  if(isset($_POST['register'])) 
    {
        $lastname = $_POST['lastname'];
        $firstname= $_POST['firstname'];
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        // $passHashed = password_hash($pass,PASSWORD_DEFAULT);
        // echo $passHashed;
        // $verify = password_verify($pass, $passHashed);
        // echo $verify;
        // exit;

        if(!$lastname){

          $errors[] = 'Lastname is required !!';

        }

        if(! $firstname){

          $errors[] = 'Firstname is required !!';
          
        }
        if(!$login){

          $errors[] = 'Login is required !!';
          
        }
        if(!$pass){

          $errors[] = 'Password is required !!';
          
        }
        if($login)
        {
            $login_query= 'SELECT LOGIN FROM clients';
            $view_login = mysqli_query($conn,$login_query);

            while($row= mysqli_fetch_assoc($view_login))
            {        
                if($row['LOGIN'] == $login)
                    {
                        $errors[]= 'Login is already used !!!';
                    }
            }
        }
    
        if(empty($errors)){
        // SQL query to insert user data into the users table
        $query= "INSERT INTO clients(lastname,firstname,login,password) 
        VALUES('{$lastname}','{$firstname}','{$login}','{$pass}')";
        $add_user = mysqli_query($conn,$query);
    
        // displaying proper message for the user to see whether the query executed perfectly or not 
          if (!$add_user) {
              echo "something went wrong ". mysqli_error($conn);
              
          }

          else {
            header("Location: ../../viewers/sign-in.php?status=1");
              }     
       }  
       else{
         header("location: ../../viewers/sign-in.php?error=2");
       }  
    }

?>

<?php if (!empty($errors)){ ?>
  <div class ="alert alert-danger">
    <?php foreach($errors as $error){?>
      <div><?php echo $error ?></div>
    <?php } ?>
  </div>
<?php } ?>



