# PDO Prepared Statements

> Una **instrucció preparada (_prepared statement_)** es tracta d'una instrucció SQL pre-compilada que pot ser executada varies vegades només enviant les dades al servidor.

* Permet evitar el ***SQL injection***.

## SELECT amb Prepared Statements

```php
<?php
  // 1. prepare sql statement
  $sql = 'SELECT firstname, lastname, email FROM MyGuest WHERE firstname = :firstname';
  $stmt = $conn->prepare($sql);

  // 2. execute to insert a row 
  // with an associative array
  $stmt->execute(
      array(':firstname'=>'John')
      );

  // 3. get all rows
  $rows = $stmt->fetchAll();

  // 4. show rows
  foreach ($rows as $row) {
 	echo $row['firstname'] . <br>;
	echo $row['lastname'] . <br>;
  }
?>
```
El métode `fetch()` o `fetchAll()` es pot definir per tal que retorni un **array**, un **objecte**, una **instància **d'una classe, etc.

`$rows = $stmt->fetch(PDO::FETCH_ASSOC);`

Únicament cal passar com a paràmetre:
* `PDO::FETCH_ASSOC`: Retorna un array associatiu. És el valor per defecte.
* `PDO::FETCH_BOTH`
* `PDO::FETCH_BOUND`
* `PDO::FETCH_CLASS`
* `PDO::FETCH_OBJ ` 

## INSERT amb Prepared Statements

```php
<?php
  // 1. prepare sql statement
  $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email)
     					VALUES (:firstname, :lastname, :email)");

  // 2. execute to insert a row
  $stmt->execute(array(':firstname'=>'John',
						':lastname'=>'Doe',
						':email'=>"john@example.com")
						);

  // execute to insert a row
  $stmt->execute(array(':firstname'=>'Mary',
						':lastname'=>'Moe',
						':email'=>"mary@example.comm")
						);
?>
```

## Referències

* **php.net:** [PDOStatement::fetch](http://php.net/manual/es/pdostatement.fetch.php)
