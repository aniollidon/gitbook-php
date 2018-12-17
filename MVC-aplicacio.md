<!-- notoc -->

# Aplicació model MVC

Aquí veurem una **versió simplificada** d'aquest model.

Bàsicament el que pretenem és intentar separar:
* el que és codi PHP
* les consultes a la base de dades
* la presentació HTML (vista)

i que com a mínim el codi d'aquesta presentació no sigui una porqueria illegible.

També s'intentarà mitjançant funcions i mètodes fer el codi el més genèric i el més entenedor possible.

Ho veurem en un exemple simplificat i molt orientat a la pràctica que heu de fer.

**config.php**

```php+lineNumbers:true
<?php
// ** MySQL settings ** //
/** MySQL hostname */
define('DB_HOST', 'localhost');

/** The name of the database */
define('DB_NAME', 'socialnetwork');

/** MySQL database username */
define('DB_USER', 'socialnetwork_user');

/** MySQL database password */
define('DB_PASSWORD', 'password');
?>
```

**Model.php**

```php+lineNumbers:true
<?php
abstract class Model{

protected $connection;
// **************************************************
// __construct()
// Connecta amb la BD
// **************************************************
public function __construct() {
try {
//Creem una nova connexió a la BD
$this->connection = new PDO ("mysql:host=". DB_HOST .";dbname=".DB_NAME,
DB_USER,
DB_PASSWORD
);
// establim el mode PDO error a EXCEPTION per poder recuperar les excepcions
$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$this->connection->exec("SET CHARACTER SET UTF8");
} catch (PDOException $e) {
echo "Error" . $e->getMessage();
}
}
}
?>
```

# El model

**User.php**

```php+lineNumbers:true
<?php
require_once 'Model.php';

class User extends Model {

// **************************************************
// exists(user)
// Comprova que si l'usuari ja existeix a la base dades
// **************************************************
public function exists($user)
{
// Consultem els usuaris de la BD
$sql = "SELECT * FROM users WHERE user=:user LIMIT 1";
$statement = $this->connection->prepare($sql);
$statement->execute(array(':user'=>$user));
$result = $statement->fetch();

return $result; // Retorna true si l'usuari existeix
// i false si no existeix
}

// **************************************************
// isValid(user, passwd)
// Comprova que l'usuari i password siguin vàlids
// **************************************************
public function isValid($user, $passwd)
{
}
/* CRUD (CREATE, READ, UPDATE, DELETE) */
// **************************************************
// create(name, username, passwd)
// Crea un nou usuari a la base de dades
// **************************************************
public function create($name, $username, $passwd)
{
}
// **************************************************
// read(userId)
// Si rep un identificador d'usuari:
// retorna les dades de l'usuari
// Si NO rep un identificador d'usuari:
// retorna tots els usuaris de la base de dades
// **************************************************
public function read($userId = '')
{
if ($userId != ''){
//Selecciona l'usuari que té el userId indicat
} else {
//Selecciona tots els usuaris
}
}
}
?>
```

# El controlador

**user/read.php**

```php+lineNumbers:true
<?php
require_once '../models/User.php';
$user = new User();
$users= $user->read();
require_once '../views/users.view.php';
?>
```

El **controlador** ha de tenir sempre aquesta estructura:
1. Inclou el model
2. Llença la consulta
3. Recull els resultats
4. Inclou la vista que mostrarà els resultats.

# La vista

**user.view.php**

```xml+lineNumbers:true
<html>
<head>
<title> MVC </title>
</head>
<body>
<h1>Llistat d'usuaris </h1>
<table>
<tr>
<th>Nom</th>
</tr>
<?php foreach ($users as $user) { ?>
<tr>
<td><?= $user['name'] ?></td>
</tr>
<?php } ?>
</table>
</body
</html>
?>
```
La **vista** simplement s'encarrega de mostrar les dades obtingudes a la consulta (fixeu-vos que estem utilitzant **la mateixa variable utilitzada al controlador**).

En aquesta aproximació al model MVC, no hem pogut separar totalment el què és codi PHP del HTML, però tampoc és [codi spaghetti](https://ca.wikipedia.org/wiki/Codi_spaghetti).


## Referències

* Anexsoft.com: [Realizando un CRUD (listar, registrar, actualizar, eliminar) con PHP](http://anexsoft.com/p/57/realizando-un-crud-listar-registrar-actualizar-eliminar-con-php)
* Anexsoft.com: [Realizando un CRUD con el patrón MVC en PHP](http://anexsoft.com/p/61/realizando-un-crud-con-el-patron-mvc-en-php)