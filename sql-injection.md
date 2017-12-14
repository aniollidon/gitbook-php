# SQL INJECTION

## Introducció

> SQL Injection és un tècnica que hacking que permet injectar instruccions SQL a través d'una pàgina de la nostra aplicació web.

**Exemple SQL injection**

Si tenim, per exemple, un formulari de login:

```php
<?php
// sql to select a record
$user = $_GET["user"];
$pass = $_GET["password"];
$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
$result = $conn->query($sql);

if ($result){
	echo "Usuari autenticat!"
}
```

I un perillós hacker omple un formulari amb aquestes dades:

![Formulari login](http://i.imgur.com/MMftsdg.png)


### **Exemple 1 SQL Injection:**
```php
<?php
	$user = "' OR 1=1 --"
	$pass = ""
	$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
?>
```
El **--** en MySQL indica que és un comentari .

```sql
SELECT * FROM users WHERE username='' OR 1=1 --' AND password=''
```

### **Exemple 2 SQL Injection:**

```php
<?php
	$user = "sergi"
	$pass = "' OR 1=1"
	$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
?>
```

```sql
SELECT * FROM users WHERE username='sergi' AND password='' OR 1=1;
```

### **Exemple 3 SQL Injection:**

```php
<?php
	$user = "'; DROP TALBE users --"
	$pass = ""
	$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
?>
```

```sql
SELECT * FROM users WHERE username=''; DROP TALBE users --' AND password=''
```


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

