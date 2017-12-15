<!-- notoc -->

#MYSQLi

```php
<?php
$servername= "localhost";
$username = "username";
$password = "password";

// Create connection
$conn= new mysqli($servername, $username, $password);

// Check connection
if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//Close connection
$conn->close();
?>
```

## MÉS INFO

* **MYSQLi** W3Schools: [http://www.w3schools.com/php/php_mysql_intro.asp](http://www.w3schools.com/php/php_mysql_intro.asp)


