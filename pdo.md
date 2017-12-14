# PDO 

## Introducció a PDO

* **PDO** (PHP Data Object) és un extensió de PHP que ens propociona una capa d'abstracció d'accés a dades.

* Per tant, ens permet utilitzar les mateixes funcions per realitzar consultes independentment de la base de dades que estiguem utilitant.

* **PDO** ve amb **PHP 5.1**.
* Requereix característiques de OO (Orientació Objectes) del nucli de PHP 5.
  * Per tant, no funcionarà en versions anteriors a 5.1.
  
## PDO CONNEXIÓ A BD

```php
<?php
$servername= "localhost";
$username = "username";
$password = "password";

try{
	//creem una nova connexió instancinat l'objecte PDO
	$conn = new PDO("mysql:host=$servername;dbname=myDB",
			$username, $password);
  // establim el mode PDO error a exception per poder
  // recuperar les excepccions
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
}
catch(PDOException $e)
{
	//Si falla la connexió amb la BD es mostra l'error.
	echo "Connection failed: " . $e->getMessage();
}
//Close connection
$conn=null;
?>
```

## PDO SELECT

```php
<?php
// sql to select a record
$sql = 'SELECT firstname, lastname, email FROM MyGuest ORDER BY firstname';

//obtenir les files de la BD
$rows = $conn->query($sql);	// use query() because results are returned

//recorrem cadauna de les files per mostrar les dades
foreach ($rows as $row) {
	 echo $row['firstname'] . "\t";
	 echo $row['lastname'] . "\t";
	 echo $row['email'] . "\n";
}
?>
```

Si realitzem un INSERT en una taula amb un **camp AUTO_INCREMENT**, podem obtenir el ID de lúltim registre inserit.

```php
<?php
$sql= "INSERT INTO MyGuests(firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

// use exec() because no results are returned
$conn->exec($sql);
$last_id = $conn->lastInsertId();

echo "New record created successfully. ";
echo "Last inserted ID is: " . $last_id;
?>
```

Si volem inserir les **dades enviades per POST** des d'un formulari:

```php
<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

$sql= "INSERT INTO MyGuests(firstname, lastname, email)
VALUES ($firstname, $lastname, $email)";

// use exec() because no results are returned
$conn->exec($sql);
echo "New record created successfully. ";
?>
```

  


## PDO DELETE

```php
<?php
	// sql to delete a record
	$sql= "DELETE FROM MyGuests WHERE id=3";

	// use exec() because no results are returned
	$conn->exec($sql);
	echo "Record deleted successfully";
?>
```

## PDO UPDATE
```php
<?php
	$sql= "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
	// Prepare statement
	$stmt= $conn->prepare($sql);
	// execute the query
	$stmt->execute();
	// echo a message to say the UPDATE succeeded
	echo $stmt->rowCount() . " records UPDATED successfully";
?>
```


## MÉS INFO
* **PDO** PHP.net: [http://php.net/manual/es/book.pdo.php](http://php.net/manual/es/book.pdo.php)