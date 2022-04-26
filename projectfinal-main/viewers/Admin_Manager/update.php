<?php  include "../../controllers/phpSrc/function.php"?>
<?php  include "../../modules/cnx_MySqli.php"?>
<?php
 session_start();
   
   if(isset($_GET['prod_id']))
    {
      $prodid = $_GET['prod_id']; 
    }
      
      $query="SELECT * FROM products WHERE idproduct = $prodid ";
      $view_products= mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($view_products))
        {
          $id = $row['idproduct'];                
          $name = $row['name'];        
          $price = $row['price'];
          $stock = $row['stock'];
          $idcateg = $row['idcategory'];
          $queryCateg = "SELECT namecateg FROM categories where idcategory = '$idcateg'";         
          $category = mysqli_query($conn,$queryCateg);
          $rowCateg= mysqli_fetch_assoc($category); 
          $desc = $row['description'];
          $url = $row['url'];
          $company = $row['company'];
        }
 
    
    $errors = [];
    $name_new = '';
    $price_new = '';
    $stock_new = '';
    $categ_new = '';
    $desc_new = '';
    $url_new ='';
    $company_new ='';
    if(isset($_POST['update'])) 
    {
        $name_new = $_POST['name'];
        $price_new = $_POST['price'];
        $stock_new = $_POST['stock'];
        $categ_new = $_POST['categ'];
        $queryCateg = "SELECT idcategory FROM categories where namecateg = '$categ_new'";         
        $category = mysqli_query($conn,$queryCateg);
        $rowCateg= mysqli_fetch_assoc($category);

        if (!$rowCateg) {
          $queryCreateCateg = "INSERT INTO categories(namecateg) VALUES('{$categ_new}')";
          $addCategory = mysqli_query($conn,$queryCreateCateg);

          $category = mysqli_query($conn,$queryCateg);
          $rowCateg = mysqli_fetch_assoc($category);
        }

        $idcateg_new = $rowCateg['idcategory'];
        $desc_new = $_POST['desc'];
        $company_new = $_POST['company'];

        if(!$name_new){

          $errors[] = 'Product name is required !!';

        }

        if(!$price_new){

          $errors[] = 'Product price is required !!';
          
        }
        if(!$stock_new){

          $errors[] = 'Product stock is required !!';
          
        }
        if(!$categ_new){

          $errors[] = 'Product category is required !!';
          
        }
        if(!$categ_new){

          $errors[] = 'Product company is required !!';
          
        }
        if(!is_dir('images')){
            mkdir('images');
        }

        if(empty($errors)){
          $image = $_FILES['url'];
          if($image['full_path']){

            $url_new = 'images/'.randomString(8).'/'.$image['name'];
            // echo $url_new;
            // exit;
            mkdir(dirname($url_new));

            move_uploaded_file($image['tmp_name'],$url_new);
          }
      
     
      $query = "UPDATE products SET name = '{$name_new}' , price = '{$price_new}' , stock = '{$stock_new}', idcategory = '{$idcateg_new}',
                description = '{$desc_new}',company = '{$company_new}' WHERE idproduct = $prodid";
      $update_user = mysqli_query($conn, $query);
    //   echo $_SESSION["login"]; 
    //   exit ; 
      $job = $_SESSION["login"] == 'root'?'admin':'manager'; 
     header("Location: Admin.php?job=$job");
    }    
    }         
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="add-product admin" id="add-product">
<h1 class="title">Update Product</h1>
            
            <form class="card" method="POST" enctype="multipart/form-data">
          
                <div class="form-control">
                   <input type="text" name="name" autocomplete="off" value="<?php echo $name ?>" required>
                   <label >Name</label>
                </div>
                <div class="form-control">
                    <input type="number" name="price" value="<?php echo $price ?>" required>
                    <label for="">Price</label>
               </div>
               <div class="form-control">
                    <input type="text" name="categ" value="<?php echo $rowCateg['namecateg'] ?>" required>
                    <label for="categ" id="categorie">Categorie</label>
               </div>
               <div class="form-control">
                    <input type="number" name="stock"  value="<?php echo $stock ?>" required>
                    <label>Stock</label>
               </div>
               <div class="form-control">
                <input type="text" name="desc" value="<?php echo $desc ?>" id="" required>
                <label>Description</label>
               </div>
               <div class="form-control">
                <input type="text"name="company" id="" value="<?php echo $company ?>"required>
                <label>Company</label>
               </div>
               <input type="submit" value="Update"  name="update" class="btn btn-primary">
            </form>
        </section>
</body>
</html>