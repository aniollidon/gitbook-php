<!-- notoc -->

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


![](/assets/sqlinjection-acudit.png)

