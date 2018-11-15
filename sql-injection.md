# SQL Injection

## Introducció

> **SQL Injection** és un tècnica que hacking que permet injectar instruccions SQL a través d'una pàgina de la nostra aplicació web.

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

![](/assets/SQLinjection.png)


### Exemple 1 SQL Injection


Si introdueix `' OR 1=1 --` en el camp user.

```php
<?php
	$user = "' OR 1=1 --"
	$pass = ""
	$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
?>
```

> El **--** en MySQL indica que és un comentari .

La consulta que s'executarà serà:

```sql
SELECT * FROM users WHERE username='' OR 1=1 --' AND password=''
```

**Com interpreta això la base de dades? **
Primer de tot busca un nom amb una cadena buida, no troba cap i per tant és fals. A continuació mira la segona condició ( 1 = 1) i evidentment és certa. 
Com l'operador **or** funciona que si una de les condicions és certa el resultat és cert.

```sql
SELECT * FROM users WHERE true
```

Amb la qual cosa ens retornarà tots els usuaris!!

**I el perillós hacker podrà autenticar-se a l'aplicació!!!**

### Exemple 2 SQL Injection

Si introdueix `' OR 1=1` en el camp password.

```php
<?php
	$user = "sergi"
	$pass = "' OR 1=1"
	$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
?>
```

La consulta que s'executarà serà:

```sql
SELECT * FROM users WHERE username='sergi' AND password='' OR 1=1;
```

**I podrà autenticar-se a l'aplicació!!!**

### Exemple 3 SQL Injection

Si introdueix `'; DROP TABLE users --` en el camp user.


```php
<?php
	$user = "'; DROP TABLE users --"
	$pass = ""
	$sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
?>
```

La consulta que s'executarà serà:

```sql
SELECT * FROM users WHERE username=''; DROP TABLE users --' AND password=''
```

**I s'eliminarà tota la taula _users_!!!**

> Per tant, evitarem sempre utilitzar els mètodes `query` o `exec` i al seu lloc utilitzarem els **Prepared Statements**.

## PDO Prepared Statements

> Una **instrucció preparada (_prepared statement_)** es tracta d'una instrucció SQL pre-compilada que pot ser executada varies vegades només enviant les dades al servidor.

* Permet evitar el ***SQL injection***.

### Exemple SELECT amb Prepared Statements

```php
<?php
  // 1. prepare sql statement
  $sql = 'SELECT firstname, lastname, email FROM MyGuest WHERE firstname = :firstname';
  $stmt = $conn->prepare($sql);

  // 2. execute to insert a row
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

### Exemple INSERT amb Prepared Statements

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


![](/assets/sqlinjection-acudit.png)

