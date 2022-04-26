
<?php

  session_start();
   
    

?>

<?php if(isset($_SESSION['stock-error'])){ ?>
	<div class="error-msg center pop-up show">
                <div class="container-close-error container-btn-close">
                    <button type="button"><i class="fas fa-times"></i></button>
                </div>

                <div class="content">
                    <?php foreach($_SESSION["stock-error"] as $msg) { ?>
                            <p>
                                <?php echo $msg ;  ?>

                            </p>
                    <?php  }  ; ?>
                 </div>
                 
    </div>
    <?php unset($_SESSION["stock-error"]); ?>
<?php } ; ?>

<?php if(isset($_SESSION['succes'])): ?>
	<div class="error-msg center pop-up show">
    <div class="container-close-error container-btn-close">
                    <button type="button"><i class="fas fa-times"></i></button>
    </div>
        <div class="content">
             <p>
           <?php 
			echo $_SESSION['succes']; 

		    ?> 
        </p>
        </div>
       
		
	</div>
    <?php unset($_SESSION["succes"]); ?>
<?php endif ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PhotoStudio</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
  />
</head>

        <body>
            <header>
                <div class="container opacity">
                    <nav>
                        <div class="toggle-nav-container">
                            <button type="button" class="open-btn">
                                <div class="hamburger">
                                    <div class="line"></div>
                                </div>
                            </button>
                        </div>
                        <div class="list-links">
                            
                            <ul>
                                <li><a href="./index.php">HOME</a></li>
                                <li><a href="./store.html">STORE</a></li>
                                <li><a href="./about.html">ABOUT</a></li>
                                <li><a href="Contact.html">CONTACT</a></li>
                            </ul>
                        </div>
                        <div class="cart-icon-container">
                            <button class="cart-icon-btn">
                                <img src="./img/cart1.png" class="carticon">
                            </button>
                            <span class="cart-item-count">1</span>
                        </div>
                    </nav>
                </div>         
            </header>
            <div class="pop-up-menu center">

               <div class="center">

                   <div class="list-links">
                        <div class="toggle-nav-container open">
                            <button type="button" class="close-btn">
                                <div class="hamburger">
                                    <div class="line"></div>
                                </div>
                            </button>
                        </div>
                        <ul>
                            <li><a href="./index.php">HOME</a></li>
                            <li><a href="./store.html">STORE</a></li>
                            <li><a href="./about.html">ABOUT</a></li>
                            <li><a href="Contact.html">CONTACT</a></li>
                        </ul>
                    </div>
               </div>
                    
           
               
            </div>
            <div class="cart-overlay">
                <aside class="cart">
                  <button class="cart-close">
                    <i class="fas fa-times"></i>
                  </button>
                  <header>
                    <h3 class="text-slanted">your bag</h3>
                  </header>
                  <!-- cart items -->
                  <div class="cart-items">
                    
                  </div>
                  <!-- footer -->
                  <footer>
                    <h3 class="cart-total text-slanted">
                      total : $12.99
                    </h3>
                    <a class="cart-checkout btn view-products" href="../controllers/phpSrc/valid.php">valid command</a>
                  </footer>
                </aside>
              </div>
            <section id="hero">
                <div class="container">
                <div class="div-lens fade-out-right none">
                    <img src="./img/Lens.png" class="lens">
                </div>
                <div class="div-rect fade-out-right-rect none">
                </div>
                <div class="div-shadow2 fade-down none">
                    <img src="./img/Shadow.png" class="shadow2">
                </div>
                <div class="div-shadow3 fade-up-shadow none">
                    <img src="./img/Shadow.png" class="shadow3">
                </div>
                <div class="div-shadow fade-out-right none">
                    <img src="./img/Shadow.png" class="shadow">
                </div>
                <div class="div-piece fade-down none">
                    <img src="./img/Image1.png" class="piece">
                </div>
                <div class="div-topiece fade-up none">
                    <img src="./img/campiece.png" class="topiece">
                </div>
                <div class="text opacity">
                    <h1>PHOTOGRAPHY</h1>
                    <h3> Workshop</h3>
                    <?php if(isset($_SESSION["login"])) {?>
                    <a href ="./sign-in.php" type="button" class="Register">
                        LOG OUT
                    </a>
                    <?php } ?>
                    <?php if(!isset($_SESSION["login"])) { ?>
                        <a href ="./sign-in.php" type="button" class="Register">
                            LOG IN NOW
                        </a>
                    <?php } ?>
                </div>
                </div>
            </section>
            <section class="featured">
                <div class="container">
                    <div class="title-featured">
                        <h2><span>/</span> featured</h2>
                    </div>
                    <div class="container-products">
                        <article class="product center">
                            <div class="container-img-product">
                                <img src="./img/Camera.png" alt="">
                                <div class="container-buttons center">
                                    <a href="./product.html" class="btn"><i class="fas fa-search"></i></a>
                                    <button class="product-cart-button btn"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            
                            </div>
                            <h3 class="product-name">high-back-bench</h3>
                            <span class="product-price">$9.99</span>
                        </article>
                        <article class="product center">
                            <div class="container-img-product">
                                <img src="./img/Camera.png" alt="">
                                <div class="container-buttons center">
                                    <a href="./product.html" class="btn"><i class="fas fa-search"></i></a>
                                    <button class="product-cart-button btn"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            
                            </div>
                            <h3 class="product-name">high-back-bench</h3>
                            <span class="product-price">$9.99</span>
                        </article>
                        <article class="product center">
                            <div class="container-img-product">
                                <img src="./img/Camera.png" alt="">
                                <div class="container-buttons center">
                                    <a href="./product.html" class="btn"><i class="fas fa-search"></i></a>
                                    <button class="product-cart-button btn"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            
                            </div>
                            <h3 class="product-name">high-back-bench</h3>
                            <span class="product-price">$9.99</span>
                        </article>
                    </div>
                    <a href="./store.html" class="view-products">view products</a>
                </div>
            </section>
 
            </div>
            <!-- <div class="error-msg center pop-up show">
                <div class="container-close-error container-btn-close">
                    <button type="button"><i class="fas fa-times"></i></button>
                </div>
                <div class="content">
                    <p>
                        you need to be logged
                    </p> 
                </div>
                
            </div> -->
            <script src="../controllers/jsSrc/index.js" type="module"></script>
        </body>
</html>