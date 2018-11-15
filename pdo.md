# PDO 

## Introducció a PDO

> **PDO** (PHP Data Object) és un extensió de PHP que ens propociona una capa d'abstracció d'accés a dades.

 Per tant, ens permet utilitzar les mateixes funcions per realitzar consultes independentment de la base de dades que estiguem utilitant.

* **PDO** ve amb **PHP 5.1**.
* Requereix característiques de OO (Orientació Objectes) del nucli de PHP 5.
  * Per tant, no funcionarà en versions anteriors a 5.1.

## Accés a la base de dades
  
El passos per **accedir a una base de dades** són:

1. Obrir la base de dades.
2. Trametre la comanda SQL a la base de dades.
3. Retornar el resultat de la consulta.
4. Tancar la connexió de la base de dades.

## Connexió a base de dades

```php
<?php
$servername= "localhost";
$dbname = "dbname";
$username = "username";
$password = "password";

try{
  //creem una nova connexió instancinat l'objecte PDO
  $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
  
  // establim el mode PDO error a exception per poder
  // recuperar les excepccions
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
}
catch(PDOException $error)
{
	//Si falla la connexió amb la BD es mostra l'error.
	echo "Connection failed: " . $error->getMessage();
}

//Tancar la connexió de la base de dades.
$conn=null;
?>
```

## PDO Select

```php
<?php
// sql to select a record
$sql = 'SELECT firstname, lastname, email FROM Users ORDER BY firstname';

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
$sql= "INSERT INTO Users(firstname, lastname, email)
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

$sql= "INSERT INTO Users(firstname, lastname, email)
VALUES ($firstname, $lastname, $email)";

// use exec() because no results are returned
$conn->exec($sql);
echo "New record created successfully. ";
?>
```

## PDO Update
```php
<?php
	// sql to update a record
	$sql= "UPDATE Users SET lastname='Doe' WHERE id=2";
	
	// use exec() because no results are returned
	// execute the query and returns the number of affected rows
	$count = $conn->exec($sql);

	// echo a message to say the UPDATE succeeded
	echo $count . " records updated successfully";
?>
```

## PDO Delete

```php
<?php
	// sql to delete a record
	$sql= "DELETE FROM Users WHERE id=3";

	// use exec() because no results are returned
	// execute the query and returns the number of affected rows

	$count = $conn->exec($sql);
	echo $count . " records deleted successfully";
?>
```


## Referències

* **PDO** PHP.net: [http://php.net/manual/es/book.pdo.php](http://php.net/manual/es/book.pdo.php)