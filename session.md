<!-- notoc -->

# Sessions

Hem vist que els **cookies** ens permetien mantenir una informació de variables més enllà d'un únic script. 

Però tenen alguns **inconvenients**:
* Cal que el navegador tingui aquesta opció habilitada.
* Es desa en l'ordinador local o client.

Per tant, si l'usuari deshabilita aquesta possibilitat, es tanca la porta a aquest manteniment de valors entre scripts. 

**PHP** proporciona un altre mecanisme per mantenir la sessió: les **variables de sessió**.

> Les **variables de sessió** són un conjunt de variables que estan disponibles a totes les pàgines del site **mentre la sessió no s'acabi**. 

Una **sessió comença** quan l'usuari es connecta a l'aplicació.
Una **sessió es tanca** quan:
  * L'usuari tanqui el navegador.
  * Passa un cert temps (definit pel sistema) sense que l'usuari interaccioni amb l'aplicació.

Les variables de sessió, a diferència de les cookies, **es guarden al servidor**.

Podem desar amb aquest sistema, per **exemple**, l'identificador d'un usuari, l'idioma preferent, un curs o grup, etc., i tenir-los disponibles en qualsevol script mentre no es tanqui la sessió. 

## Creació de la sessió

Per iniciar o continuar una sessió, s'utilitza la funció **session_start()**, que cal posar a l’inici de cada pàgina que faci referència a la mateixa sessió. 

A cada sessió se li assigna un **identificador (ID) de sessió** exclusiu i aleatori, que conté tota la informació actual.

**pagina1.php**

```php
<?php
  // Start the session
  session_start();
?>
<!DOCTYPE html>
<html>
  <body>
  <?php
    // Set session variables
    $_SESSION["username"] = "sergi";
    $_SESSION["favcolor"] = "red";
    echo "Session variables are set.";
   ?>
  </body>
</html>
```

## Recuperació variables de sessió

Primerament, cal **reobrir la sessió** identificada amb un ID deteminat amb la funció **_session_start()_**.
* L'**identificador de sessió** actual s'ha guardat en una **cookie**, pel que únicament si les tenim activades, podrem utilitzar les sessions d'aquesta manera.
* Si per el contrari no tenim les cookies activades, podem passar l'ID de sessió per la URL.

**pagina2.php**

```php
<?php
  // Restart de session
  session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
  // Echo session variables that were set on previous page
  echo "Username is " . $_SESSION["username"] . ".<br>";
  echo "Favorite color is " . $_SESSION["favcolor"] . ".";
?>
</body>
</html>
```

## Funcions de gestió de sessions

**bool session_start (void)  **
Crea o continua una sessió amb l'ID passat com a paràmetre via GET o COOKIE. 

**bool session_destroy (void)**
Destrueix i tanca totes les dades relacionades amb una sessió. 
Retorna TRUE si ha anat bé o FALSE en cas contrari

**void session_unset (void)**
Allibera totes les variables de sessió actualment registrades.

**string session_name ([string name])**
Retorna el nom de la sessió actual. 
Si s'especifica nom es modifica l'actual pel nou valor.

**string session_id ([string id])**
Retorna l'identificador de la sessió actual. 
Si s'especifica un identificador, l'actual es modificarà pel nou valor. 
