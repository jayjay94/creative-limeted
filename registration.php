

 <?php
  require('db.php');
 
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  

  <title>registration</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<style>


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



<style>


body{

margin: 0;

padding: 0;

font-family: sans-serif ;

background:url("mix.jpg") no-repeat ;

background-size: cover;

}


.registration-box{
     

 width: 280px ;

position: absolute ;

top: 50%;

left:50%;

transform: translate(-50%, -50%);

color:white;



}


.text-box{


    width:200%;

    font-size:20%;

    padding:8px 0;

    margin:8px 0;


}

input[type=text], select { 
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

h1 {


color

}





</style>

<?php

	require('db.php');
   
    if (isset($_REQUEST['Username'])){  // if data is submited entered system will input into database.
		$username = stripslashes($_REQUEST['Username']); // removes backslashes
		$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($conn,$email);
		$password = stripslashes($_REQUEST['Password']);
		$password = mysqli_real_escape_string($conn,$password);

    $trn_date = date("Y-m-d H:i:s");
    
        $query = "INSERT into customer (customer_name,customer_password,customer_email) VALUES ('$username','$password','$email')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="registration-box">

<form name="registration " action="" method="post">


 
<h1 style="color:black;"> registration </h1>

<div class="textbox">

<input type="text" name="Username" placeholder="Username" required />
</div>
<br>
 
<div class="textbox"> 
<input type="text" name="email" placeholder="email" required />

</div>
<br>



<div class="textbox"> 
<input type="password" name="Password" placeholder="Password" required />

</div>
<br>


<div class="textbox"> 
<input type="submit" name="submit" value="Login" />





</div>


</form>

</div>
<?php } ?>
</body>
</html>









