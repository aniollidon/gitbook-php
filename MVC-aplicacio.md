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
            
            $conexion = new PDO ("mysql:host=".$db_config['hostname'].";dbname=".$db_config['dbname'],
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

```php


```

# El controlador

# La vista
