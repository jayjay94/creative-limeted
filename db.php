


 <?php
$servername = "localhost";        //database connection code variables
$username = "root";
$password = "";
$database = "Creative Limited";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database );

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>