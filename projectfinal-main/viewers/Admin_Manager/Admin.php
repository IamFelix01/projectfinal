<?php
session_start();
// var_dump($_SESSION);
// exit;
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset( $_SESSION['login'],$_SESSION['pass'])){

  header("Location: login.html");

}
if(!$_GET['job'])
{
    $job = $_SESSION["login"] == 'root'?'admin':'manager'; 
    header("Location: Admin.php?job=$job");
}
// var_dump($_SESSION);
// exit;
?>
<?php 
 include "../../modules/cnx_MySqli.php";
 include "../../controllers/phpSrc/function.php";

  $errors = [];
  $name = '';
  $price = '';
  $stock = '';
  $categ = '';
  $desc = '';
  $url ='';
  $company ='';
  if(isset($_POST['create'])) 
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $categ = $_POST['categ'];

        $queryCateg = "SELECT idcategory FROM categories where namecateg = '$categ'";         
        $category = mysqli_query($conn,$queryCateg);
        $rowCateg= mysqli_fetch_assoc($category);

        if (!$rowCateg) {
          $queryCreateCateg = "INSERT INTO categories(namecateg) VALUES('{$categ}')";
          $addCategory = mysqli_query($conn,$queryCreateCateg);

          $category = mysqli_query($conn,$queryCateg);
          $rowCateg = mysqli_fetch_assoc($category);
        }

        $idcateg = $rowCateg['idcategory'];
        $desc = $_POST['desc'];
        $company = $_POST['company'];

        if(!$name){

          $errors[] = 'Product name is required !!';

        }

        if(!$price){

          $errors[] = 'Product price is required !!';
          
        }
        if(!$stock){

          $errors[] = 'Product stock is required !!';
          
        }
        if(!$categ){

          $errors[] = 'Product category is required !!';
          
        }
        if(!$company){

          $errors[] = 'Product company is required !!';
          
        }
        if(!is_dir('images')){
            mkdir('images');
        }

        if(empty($errors)){
          $image = $_FILES['url'];
          if($image['full_path']){

            $url = 'images/'.randomString(8).'/'.$image['name'];

            mkdir(dirname($url));

            move_uploaded_file($image['tmp_name'],$url);
          }
        // SQL query to insert user data into the users table
        $query= "INSERT INTO products(name,price,stock,idcategory,description,url,company) 
        VALUES('{$name}','{$price}','{$stock}','{$idcateg}','{$desc}','{$url}','{$company}')";
        $add_prod = mysqli_query($conn,$query);
    
        // displaying proper message for the user to see whether the query executed perfectly or not 
          if (!$add_prod) {
              echo "something went wrong ". mysqli_error($conn);
          }

          else { 
            echo "<script type='text/javascript'>alert('Product added successfully!')</script>";
              }     
       }    
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Responsive Dashboard </title>
    <link rel="stylesheet" href="./style.css">
    <!-- Marerial Icones  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <!-- <img src="./images/logosaid.png"> -->
                    <h2> Photo<span class="danger">Graphe</span> </h2>
                
                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">close</span>
                    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                </div>
            </div>
            </div>
            <div class="sidebar">
                <a href="#dashboard" class="active link">
                    <span class="material-symbols-sharp">dashboard</span>
                    <h3> Dashboard </h3>
                </a>
                <a href="#products" class="admin link">
                    <span class="material-symbols-outlined">inventory</span>
                    <link rel="stylesheet"
                        href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                    <h3> Products </h3>
                </a>
                <a href="#orders" class="manager link">
                    <span class="material-symbols-outlined"> receipt_long </span>
                    <link rel="stylesheet"
                        href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                    <h3> Orders</h3>
                </a>
               
                <a href="#add-product" class="admin link">
                    <span class="material-symbols-sharp">add</span>
                    <h3> Add Product </h3>
                </a>
                <a href="../../controllers/phpSrc/Admin_Manager/logout.php">
                    <span class="material-symbols-sharp">logout</span>
                    <h3> Logout </h3>
                </a>
            </div>
        </aside>

        <!-- ----------------------- THE MAIN SECTION -------------------- -->
        <main>
            <section class="dashboard" id="dashboard">
                <h1 class="title"> Dashboard </h1>                

            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-outlined">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3> Total sales </h3>
                            <h1> $25,024 </h1>
                        </div>          
                    </div>
                    <small class="text-muted"> Last 24 Hours</small>
                </div>
      <!--END SALES-->
            <div class="orders">
                <span class="material-symbols-outlined">bar_chart</span>
                <div class="middle">
                    <div class="left">
                        <h3> Total Orders </h3>
                        <h1> 327 </h1>
                    </div>          
                </div>
                <small class="text-muted"> Last 24 Hours</small>
            </div>
         <!--END ORDERS-->
                <div class="product">
                    <span class="material-symbols-outlined">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3> Total Products </h3>
                            <h1> 1225  </h1>
                        </div>          
                    </div>
                    <small class="text-muted"> Last 24 Hours</small>
                </div>
             <!--END PRODUCTS-->
            </div>
            <div class="recent-products">
                <h2> Recent Products </h2>
                <table>
                    <thead>
                        <tr>
                            <th> Product Name </th>
                            <th> Product Price </th>
                            <th> Category </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php

                             include "../../modules/cnx_MySqli.php";
                            $query="SELECT * FROM products order by idproduct desc limit 3";               // SQL query to fetch all table data
                            $view_products= mysqli_query($conn,$query);    // sending the query to the database

                            //  displaying all the data retrieved from the database using while loop
                            while($row= mysqli_fetch_assoc($view_products)){
                            $id = $row['idproduct'];                
                            $name = $row['name'];        
                            $price = $row['price'];
                            $idcateg = $row['idcategory'];
                            $queryCateg = "SELECT namecateg FROM categories where idcategory = '$idcateg'";         
                            $category = mysqli_query($conn,$queryCateg);
                            $rowCateg= mysqli_fetch_assoc($category);        
                            // if(empty($rowCateg))
                            // {
                            //   $rowCateg['namecateg']='';
                            // }
                            echo "<tr >";
                            echo " <td > {$name}</td>";
                            echo " <td > {$price}</td>";
                            echo " <td >{$rowCateg['namecateg']} </td>";
                            // echo "<td class='primary'><a href='view.php?prod_id={$id}'>View</a>  </td>";
                            // echo "<td class='primary'><a href='update.php?edit&prod_id={$id}'>Edit</a>  </td>";
                            // echo "<td class='warning'><a href='delete.php?delete={$id}'> Delete</a></td>";
                            // echo " </tr> ";
                                }  
                        ?>
    
                        </tr>
                    </tbody>
                </table>           
            </div>
        </section>

        <!--------------------------------------------------- Product Section -------------------------------------------->

        <section class="products scroll none" id="products">
            <h1 class="title"> Products </h1>  
            <div class="container-table">
                <table>
                <thead>
                    <tr>
                        <th> Product Name </th>
                        <th> Product Price </th>
                        <th> Categorie </th>
                        <th colspan="2"> Option </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php

                    include "../../modules/cnx_MySqli.php";
                    $query="SELECT * FROM products";               // SQL query to fetch all table data
                    $view_products= mysqli_query($conn,$query);    // sending the query to the database

                    //  displaying all the data retrieved from the database using while loop
                    while($row= mysqli_fetch_assoc($view_products)){
                    $id = $row['idproduct'];                
                    $name = $row['name'];        
                    $price = $row['price'];
                    $idcateg = $row['idcategory'];
                    $queryCateg = "SELECT namecateg FROM categories where idcategory = '$idcateg'";         
                    $category = mysqli_query($conn,$queryCateg);
                    $rowCateg= mysqli_fetch_assoc($category);        
                    // if(empty($rowCateg))
                    // {
                    //   $rowCateg['namecateg']='';
                    // }
                    echo "<tr >";
                    echo " <td > {$name}</td>";
                    echo " <td > {$price}</td>";
                    echo " <td >{$rowCateg['namecateg']} </td>";
                    echo "<td class='primary'><a href='update.php?edit&prod_id={$id}'>Edit</a>  </td>";
                    echo "<td class='warning'><a href='../../controllers/phpSrc/Admin_Manager/delete.php?delete={$id}'> Delete</a></td>";
                    echo " </tr> ";
                    }  
                    ?>
                    </tr>
                  
                </tbody>
            </table>  
            </div>                    
        </section>

        <!------------------------------------------ Orders Section ------------------------------------------->

        <section class="Orders scroll none" id="orders">
            <h1 class="title"> Orders </h1>  
            <div class="container-table">
                <table>
                    <thead>
                        <tr>
                          
                            <th> ID </th>
                            <th> Date </th>
                            <th> Option </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                        $query="SELECT * FROM commands where is_valid = 0 ";               // SQL query to fetch all table data
                        $view_commands= mysqli_query($conn,$query);    // sending the query to the database

                        //  displaying all the data retrieved from the database using while loop
                        while($row= mysqli_fetch_assoc($view_commands)){
                        $id = $row['idcommand'];   
                        $date = $row['date'];             
                        echo "<tr >";
                        echo " <td>{$id}</td>";
                        echo " <td > {$date}</td>";

                        echo " <td class='warning'> <a href='../../controllers/phpSrc/Admin_Manager/validate.php?valid&com_id={$id}'>Validate</a> </td>";

                        echo " </tr> ";
                        }  
                        ?>
                        </tr>
                        
                    </tbody>
                </table> 
            </div>
                        
        </section>
        <section class="add-product none admin" id="add-product">
           


            <h1 class="title">Add Product</h1>
            
            <form class="card" method="POST" enctype="multipart/form-data">
                <div class="form-control">
                   
                    <input type="file" name="url" id="img">
                </div>
                <div class="form-control">
                   <input type="text"  autocomplete="off" name="name" required>
                   <label >Name</label>
                </div>
                <div class="form-control">
                    <input type="number" name="price" required>
                    <label for="">Price</label>
               </div>
               <div class="form-control">
                    <input type="text" name="categ" required>
                    <label for="categorie" id="categorie">Categorie</label>
               </div>
               <div class="form-control">
                    <input type="number" name="stock" required>
                    <label>Stock</label>
               </div>
               <div class="form-control">
                <input type="text" name="desc" id="" required>
                <label>Description</label>
               </div>
               <div class="form-control">
                <input type="text" name="company" id="" required>
                <label>Company</label>
                </div>
               <input type="submit" value="Send" name="create" class="btn btn-primary">
            </form>
        </section>
        </main>
                 <!-- ----------------------- END OF MAIN -------------------- -->
                 <div class="right">
                     <div class="top">
                         <button id="menu-btn">
                             <span class="material-icons-sharp">menu</span>
                         </button>
                         <div class="theme-toggler">
                            <span class="material-icons-sharp active">light_mode</span>
                            <span class="material-icons-sharp">dark_mode</span>
                         </div>
                     </div>
                 </div>
                 <!------- -----END OF TOP ------------->
         
           



    </div>

   <script src="../../controllers/jsSrc/Admin_Manager/index.js"></script>
</body>

</html>