# PDO Prepared Statements

## Definició Prepared Statements

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
  $servername = "localhost";
  $dbname = "myDB";
  $username = "username";
  $password = "password";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
         			  VALUES (:firstname, :lastname, :email)";

    // 1. prepare sql statement
    $stmt = $conn->prepare($sql);

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
  }
  catch(PDOException $e)
  {
     echo $sql . "<br>" . $e->getMessage();
  }

$conn = null;
?>
```

## UPDATE amb Prepared Statements

```php
<?php
  $servername = "localhost";
  $dbname = "myDB";
  $username = "username";
  $password = "password";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "UPDATE MyGuests SET lastname=:lastname WHERE id=:id";

      // 1. Prepare statement
      $stmt = $conn->prepare($sql);

      // 2. execute the query
      $stmt->execute(array(':lastname'=>'Doe',
                           ':id'=>'2')
                    );

      // 3. echo a message to say the UPDATE succeeded
      echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
       echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
```

## DELETE amb Prepared Statements

```php
<?php
  $servername = "localhost";
  $dbname = "myDB";
  $username = "username";
  $password = "password";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "DELETE FROM MyGuests WHERE id=:id";

      // 1. Prepare statement
      $stmt = $conn->prepare($sql);

      // 2. execute the query
      $stmt->execute(array(':id'=>3));

      // 3. echo a message to say the DELETE succeeded
      echo $stmt->rowCount() . " records DELETED successfully";
    }
catch(PDOException $e)
    {
       echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
```





## Referències

* **php.net:** [PDOStatement::fetch](http://php.net/manual/es/pdostatement.fetch.php)
