# PDO 

## Introducció a PDO

* **PDO** (PHP Data Object) és un extensió de PHP que ens propociona una capa d'abstracció d'accés a dades.

* Per tant, ens permet utilitzar les mateixes funcions per realitzar consultes independentment de la base de dades que estiguem utilitant.

* **PDO** ve amb **PHP 5.1**.
* Requereix característiques de OO (Orientació Objectes) del nucli de PHP 5.
  * Per tant, no funcionarà en versions anteriors a 5.1.
  
  
## PDO PREPARED STATEMENTS

> Una **instrucció preparada** es tracta d'una instrucció SQL pre-compilada que pot ser executada varies vegades només enviant les dades al servidor.

* Permet evitar el *SQL injection*.

### Exemple INSERT amb Prepared Statements

```php
<?php
  // prepare sql statement
	$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
					VALUES (:firstname, :lastname, :email)");

	// execute to insert a row
	$stmt->execute(array(':firstname'=>'John',
						':lastname'=>'Doe',
						':email'=>"john@example.com"));

	// execute to insert a row
	$stmt->execute(array(':firstname'=>'Mary',
						':lastname'=>'Moe',
						':email'=>"mary@example.comm"));
?>
```

### Exemple SELECT amb Prepared Statements

```php
<?php
  // 1. prepare sql statement
	$sql = 'SELECT firstname, lastname, email FROM MyGuest WHERE firstname = :firstname';
	$stmt = $conn->prepare($sql);

	// 2. execute to insert a row
	$stmt->execute(array(':firstname'=>'John'));

	// 3. get all rows
	$rows = $stmt->fetchAll();

	// 4. show rows
	foreach ($rows as $row) {
		echo $row['firstname'];
		echo $row['lastname'];
	}
?>
```
El métode fetch() es pot definir per tal que retorni un array, un objecte, una instància d’una classe, etc.

`$rows = $stmt->fetch(PDO::FETCH_ASSOC);`

Únicament cal passar com a paràmetre:
* PDO::FETCH_ASSOC: Retorna un array associatiu. És el valor per defecte.
* PDO::FETCH_BOTH
* PDO::FETCH_BOUND
* PDO::FETCH_CLASS
* PDO::FETCH_OBJ  

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