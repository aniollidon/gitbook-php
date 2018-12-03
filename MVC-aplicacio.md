# Aplicació model MVC

Aquí veurem una versió bastant simple d'aquest model.

Bàsicament el que pretenem és intentar separar el que és codi PHP i les consultes a la base de dades, del que és la presentació HTML (vista) i que com a mínim el codi
d'aquesta presentació no sigui una porqueria illegible.

També s'intentarà mitjançant funcions fer el codi el més genèric i més entenedor possible.

Ho veurem en un exemple molt simplificat i molt orientat a la pràctica que heu de fer.

Aquí només tindrem una consulta que ens mostrarà el nom de tots els usuaris, però es pot estendre el que sigui necessari.

# El model

**database.php**

```php+lineNumbers:true
<?php
class Database{

    // ************************************************** 
    // connect()
    // Connecta amb la BD
    // ************************************************** 
    
    public static function connect() {
    
        try {
            $db_config = array(
                'hostname' => 'localhost',
                'dbname' => "db_name",
                'username' => "db_user",
                'passwd' => 'db_pwsd'
            );
            
            $conexion = new PDO("mysql:host=".
                $db_config['hostname'].";
                dbname=".$db_config['dbname'],
                $db_config['username'],
                $db_config['passwd']
            );
            
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET UTF8");
            
            return $conexion;
        
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
?>
```



**user.php**

```php+lineNumbers:true
<?php
class User {
    private $connection;

    public function __CONSTRUCT(){
        try {
            $this->connection = Database::Connect();
        } 
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

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

        return $result; // Retorna treu si l'usuari existeix 
                        // i false si no existeix
    }

    // ************************************************** 
    // valid(user, passwd)
    // Comprova que l'usuari i password siguin vàlids
    // ************************************************** 
    public function valid($user, $passwd)
    {
        
    }
        
    // ************************************************** 
    // create(name, username, passwd)
    // Crea un nou usuari a la base de dades
    // ************************************************** 
    public function create($name, $username, $passwd)
    {
        
    }
    
    // ************************************************** 
    // getAll()
    // Retorn tots els usuaris de la base de dades
    // ************************************************** 
    public function getAll()
    {
        
    }
}
?>
```

# El controlador

**userController.php**

```php+lineNumbers:true
<?php
    require_once 'models/user.php';
    
    $user = new User();
    $users= $user->getAll();
    
    require_once 'views/users.view.php';
?>
```

El **controlador** ha de tenir sempre aquesta estructura:
    1. Inclou el model
    2. Llença la consulta
    3. Recull els resultats 
    4. Inclou la vista que mostrarà els resultats.

# La vista

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
         <?php foreach ($usuaris as $usuari) { ?>
             <tr>
                 <td><?php echo $usuari ['name'] ?></td>
             </tr>
         <?php } ?>
     </table>
 ?>
 ```
 
La **vista** simplement s'encarrega de mostrar les dades obtingudes a la consulta (fixeu-vos que estem utilitzant la mateixa variable utilitzada al controlador) .

No hem pogut separar absolutament el que és PHP del codi HTML, però tampoc és [codi spaghetti](https://ca.wikipedia.org/wiki/Codi_spaghetti).
