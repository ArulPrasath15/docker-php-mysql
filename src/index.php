
<!DOCTYPE html>
<html>
<body>

<h1>Hello World!</h1>

<?php

getenv('MYSQL_HOST') ? $db_host=getenv('MYSQL_HOST') : $db_host="localhost";
getenv('MYSQL_PORT') ? $db_port=getenv('MYSQL_PORT') : $db_port="3306";
getenv('MYSQL_USER') ? $db_user=getenv('MYSQL_PORT') : $db_user="root";
getenv('MYSQL_PASS') ? $db_pass=getenv('MYSQL_PORT') : $db_pass="";
getenv('MYSQL_USER_FILE') ? $db_user=trim(file_get_contents(getenv('MYSQL_USER_FILE'))):null;
getenv('MYSQL_PASS_FILE') ? $db_pass=trim(file_get_contents(getenv('MYSQL_PASS_FILE'))):null;
getenv('MYSQL_NAME') ? $db_name=getenv('MYSQL_NAME') : $db_name="";



// $conn = new mysqli("$db_host:$db_port", $db_user, $db_pass);
	
	
$conn = new mysqli("mysql:3306", "root", "test");


// Check connection
if ($conn -> connect_errno) {
  ?>
  <h1 style="color:red;" >Not Connected with MySQL</h1>

<?php
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
else{
  ?>
  <h1 style="color:green;" >Connected with MySQL</h1>

<?php
}

// Check connection
if ($conn->connect_error) 
	die("Connection failed: " . $conn->connect_error);
 
if (!($result=mysqli_query($conn,'SHOW DATABASES')))
    printf("Error: %s\n", mysqli_error($conn));

echo "<h3>Databases</h3>";

while($row = mysqli_fetch_row( $result ))
    echo $row[0]."<br />";

$result -> free_result();
$conn->close();
?>



</body>
</html>
