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

Podem desar amb aquest sistema, per **exemple**:
* l'identificador d'un usuari que s'ha autenticat.
* l'idioma preferent.
* en una botiga virtual els productes de la cistella.

I els tindrem disponibles en qualsevol script mentre no es tanqui la sessió. 

## Creació de la sessió

Per iniciar o continuar una sessió, s'utilitza la funció **session_start()**, que cal posar a l’inici de cada pàgina que faci referència a la mateixa sessió.

A cada sessió el servidor li assigna un **identificador (ID) de sessió** exclusiu i aleatori, com per exemple:

`dkfjdlrugk00dfdgdpeffdd126` 

En el **servidor** també es guarda un fitxer associat a la sessió on anirà guardant les variables de sessió que es creïn, si és el cas.

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

Quan un **client** es connecta per segona vegada al servidor (una altra pàgina per exemple) ha d’especificar al servidor quin identificador de sessió (ID) té. 
Hi ha dos mètodes:
* En una cookie: s’envia una cookie al servidor amb l’id de la sessio i les dades que es guarden en les variables de sessio. Podem decidir el nom de la cookie amb session_name().
* A través de la URL: Enllaçarem a la següent pàgina amb un paràmetre que trameti l’identificador de sessió. Aquest mètode assegura el bon funcionament en el cas que el client tingui les cookies deshabilitades. Amb l'inconvenit que l'identificació de la sessió queda visible...

```php
  echo "<a  href='seguent.php?'.session_name().'='.session_id()";
```

Primerament, cal **reobrir la sessió** identificada amb un ID deteminat amb la funció **_session_start()_**.

* L'**identificador de sessió** actual s'ha guardat en una **cookie**, pel que únicament si les tenim activades, podrem utilitzar les sessions d'aquesta manera.
* Si per el contrari no tenim les cookies activades, podem passar l'ID de sessió per la URL.

Les variables de sessió s’emmagatzemen en un array associatiu, que té la forma següent: 	

_**$_SESSION["variable_sessio"]**_

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

**bool session_start()  **
Crea o continua una sessió amb l'ID passat com a paràmetre via GET o COOKIE. 

**bool session_destroy()**
Destrueix i tanca totes les dades relacionades amb una sessió. 
Retorna TRUE si ha anat bé o FALSE en cas contrari

**void session_unset()**
Buida el contingut de totes les variables de sessió actuals.
O el que és el mateix, tanquem la sessió

**string session_name ([string name])**
Retorna el nom de la sessió actual. 
Si s'especifica nom es modifica l'actual pel nou valor.

**string session_id ([string id])**
Retorna l'identificador de la sessió actual. 
Si s'especifica un identificador, l'actual es modificarà pel nou valor. 
