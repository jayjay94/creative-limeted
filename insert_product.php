
 <?php include('db.php');?>


<!DOCTYPE html>


<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    
  <title>home</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>
<body>
<style>

body {margin:0;

  background-color: grey ;
  background-repeat: no-repeat;
  background-size: 100%;
}
/* Add a black background color to the top navigation */
.topnav {
  overflow: hidden;
  background-color: #f1f1f1;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid red;
}
.topnav a.active {
  border-bottom: 3px solid red;
}
.topnav-right {        
  float: right;
}

.main_wrapper{
  width:100px;
  height:auto;
  margin:auto;   
  float: left;
  
}

.head_wrapper{
  width:100px;
  height:150;

}


.content_wrapper{
  background-color:grey;
  width: 100%px;
  padding: 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  height:auto;
  margin:auto; 
 font-size:20px;

}


</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="http://localhost/online_store/visible/">Home</a>
  <a href="http://localhost/online_store/about.php">about</a>
  <a href="http://localhost/online_store/products.php">products</a>

  <div class="topnav-right">
  <a href="http://localhost/online_store/contact.php">Contact</a>
  <a href="http://localhost/online_store/login.php">login</a>
  <a href="">cart<a>
  <a href="">my account<a>

</div>
</div>

<form action="insert_product.php"  method="POST" enctype="multipart/form-data"> <!--inserst products table-->

<br>
<br>

<table align="center" width="600" border="6" style="background-color:#F8F8FF;">

<td colspan="8"><h2> insert products </h2></td>

<tr colspan="8">

<tr>
<td>product name</td>
<td> <input type="text" name="product_name" size="60"> </td>
</tr>

<tr>
<td>product price</td>
<td colspan="8"> <input type="text"  name="product_price" size="60" >   </td>
</tr>


<tr>
<td>product description</td>
<td> <textarea name="product_description" cols="20"  rows="10" >   </textarea>   </td>
</tr>


<tr>
<td>product keywords</td>
<td> <input type="text" name="product_keywords" size="60" >   </td>
</tr>


<tr>
<td>product image</td>
<td> <input type="file" name="product_image" size="60" >   </td>
</tr>



<tr>
<td>product category</td>
<td> 

<select name="product_category"> <option> select category </option> 

<?php

//getting categories
  
  $get_cats="select * from category";        //selects databse table
  $run_cats = mysqli_query($conn,$get_cats);     //getting categories querys databse
  
  while($row_cats=mysqli_fetch_array($run_cats)){       
  
  $category_id=$row_cats['category_id'];        
  $category_name=$row_cats['category_name'];
   
                                                // while loop for query and print of table colums
  
  echo "<option>$category_name</option>";
  

  }
  

?>


</select>


<tr>
<td>product brand</td>
<td> 

<select name="product_brand"> <option> select brand </option> 



<?php

$get_brands="select * from brand";        //selects databse table
$run_brands = mysqli_query($conn,$get_brands);     //getting brands querys databse

while($row_brands=mysqli_fetch_array($run_brands)){       

$brand_id=$row_brands['brand_id'];        
$brand_name=$row_brands['brand_name'];
 
                                              // while loop for query and print of table colums

echo "<option value='$brand_id'>$brand_name</option>";



}
  

?>


</select>


</td>

</tr>



</td>

</tr>


<tr>
<td colspan="8" align="center"> <input type="submit" name="insert_post" value="submit">   </td>
</tr>

</tr>

</table>

</form>

</body>

</html>

<?php



if (isset($_POST['insert_post'])){
//getting the text form data from the input
$product_name=$_POST['product_name'];
$product_price=$_POST['product_price'];
$product_description=$_POST['product_description'];
$product_keywords=$_POST['product_keywords'];
$product_category=$_POST['product_category'];
$product_brand=$_POST['product_brand'];

//getting the image file data from the form input
$product_image=$_FILES['product_image']['name'];
$product_image_tmp=$_FILES['product_image']['tmp_name'];


move_uploaded_file($product_image_tmp,"$product_image");

$insert_product= "INSERT into product_details (product_name,product_price,product_description,product_keywords,product_category,product_brand) values 
('$product_name','$product_price','$product_description','$product_keywords','$product_category','$product_brand','$product_image','$product_image_tmp')";      


$insert_pro=mysqli_query($conn,$insert_product);


if($insert_pro){


  echo " <script> alert('product has been inserted') </script> ";
  echo "<script>  window.open('insert_product.php','_self') </script>";

} 


}


?>