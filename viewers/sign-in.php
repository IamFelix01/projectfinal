
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
</head>
<body>


<div class="connexion-pop-up pop-up show">
                <div class="container-close-cnx container-btn-close">
                    <button type="button"><i class="fas fa-times"></i></button>
                </div>
                <div class="container">
                <div class="signin-signup">
                    
                <form action="../controllers/phpSrc/sign_in.php" method="POST" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <box-icon name='user' type='solid'></box-icon>
                        <input type="text" name="login" placeholder="Username" required>
                    </div>
                    <div class="input-field">
                        <box-icon name='lock-alt' type='solid'></box-icon>
                        <input type="password" name="pass" placeholder="Password" required>
                    </div>
                    <input type="submit"  name="connect" value="Login" class="btn">
                    <p class="account-text">Dont't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
                </form>
                <form action="../controllers/phpSrc/register.php" method="post" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <box-icon name='user' type='solid'></box-icon>
                        <input type="text" name="lastname" placeholder="Lastname" required>
                    </div>
                    <div class="input-field">
                        <box-icon type='solid' name='envelope'></box-icon>
                        <input type="text" name="firstname" placeholder="Firstname" required>
                    </div>
                    <div class="input-field">
                        <box-icon type='solid' name='envelope'></box-icon>
                        <input type="text" name="login" placeholder="Login" required>
                    </div>
                    <div class="input-field">
                        <box-icon name='lock-alt' type='solid'></box-icon>
                        <input type="password" name="pass" placeholder="Password" required>
                    </div>
                    <input type="submit" name="register" value="Sign Up" class="btn">
                    <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
                </form>
        
                </div>
                <div class="panels-container">
                    <div class="panel left-panel">
                        <div class="content">
                            <h3>Client of our shop?</h3>
                            <p>Login now</p>
                            <button id="sign-in-btn" class="btn">Sign in</button>
                        </div>
                        <img src="./img/signin.svg" class="image">
                    </div>
                    <div class="panel right-panel">
                        <div class="content">
                            <h3>New visitor?</h3>
                            <p>Register Now</p>
                            <button id="sign-up-btn" class="btn">Sign up</button>
                        </div>
                        <img src="./img/signup.svg" class="image">
                    </div>
                </div>
            </div>
            <script>
                const error = window.location.search; 
               
                if(error === '?error=1'){
                    alert("username or password is invalid");
                }
                else if(error === '?error=2'){
                    alert("login is already used ! try a second one"); 
                } 
                else if(error === '?status=1'){
                    alert("user is succefully added you can now log in");
                }  
            </script>
            <script src="../controllers/jsSrc/sign-in.js"></script>
</body>
</html>