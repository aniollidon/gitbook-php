# Sessions

## Introducció

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

## Funcionament

A cada sessió el servidor li assigna un **identificador (ID) de sessió** exclusiu i aleatori, com per exemple:

  `dkfjdlrugk00dfdgdpeffdd126` 

En el **servidor** es crea un fitxer associat a la sessió on s'anirà guardant les variables de sessió que es creïn.

Quan un **client** es connecta per segona vegada al servidor (una altra pàgina per exemple) ha d'especificar al servidor quin identificador de sessió (ID) té. 

Hi ha dos mètodes:

* **En una cookie**: 
    * S’envia una cookie al servidor **únicament amb l'id de la sessió** 
    * Les altres dades (que poden ser sensibles) es guarden en les variables de sessió (en el servidor) i no en el client (com amb les cookies clàssiques). 
    * Per defecte la cookie que conté el id de sessió s'anomena **_PHPSESSID_** però el podem canviar amb session_name().

![](/assets/PHPSessions-cliente_servidor.png)

* **A través de la URL**: 
    * Enllaçarem a la següent pàgina amb un paràmetre que trameti l'identificador de sessió per la URL. 

    ```php
    echo "<a  href='seguent.php?'.session_name().'='.session_id()";
    ```

    * Aquest mètode assegura el bon funcionament en el cas que el client tingui les **cookies deshabilitades**. 
    * Amb l'inconvenient que l'**identificació de la sessió queda visible**.
    * A partir PHP v4.0.2 és capaç d'enviar automàticament el id de sessió sense que haguem de modificar tots els enllaços.

## Creació de la sessió

Per iniciar o continuar una sessió, s'utilitza la funció **session_start()**, que cal posar a l’inici de cada pàgina que faci referència a la mateixa sessió.

Quan és la primera vegada que el client visita la pàgina:

  1. El servidor genera el id de sessió aleatoriament. 
  2. Crea el fitxer en el servidor on guardarà les variables de sessió.
  3. Envia el id de sessió al client per tal que el pugui guardar.

Un cop iniciada la sessió, accedim (o crearem) a les variables de sessió utilitzant un array associatiu **_$_SESSION_**, que té la forma següent: 	

`$_SESSION["variable_sessio"]`

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

* L'**identificador de sessió** actual s'ha guardat en una **cookie**, per tant únicament si les tenim activades, podrem utilitzar les sessions d'aquesta manera.
* Si no tenim les cookies activades, podem passar l'ID de sessió per la URL.

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
  // Mostrem les variables sessió que s'han creat en la pàgina aterior
  echo "Username is " . $_SESSION["username"] . ".<br>";
  echo "Favorite color is " . $_SESSION["favcolor"] . ".";
  
  //Eliminem una variable de sessió
  unset($_SESSION["username"])

?>
</body>
</html>
```

## Funcions de gestió de sessions

* **bool session_start()**

  Crea o continua una sessió amb l'ID passat com a paràmetre via GET o COOKIE. 

* **bool session_destroy()**

  Destrueix i tanca totes les dades relacionades amb una sessió. 
  Es sol utilitzar en els _Log outs_ de les pàgines per esborrar tota la informació de la sessió (usuari, contrassenya, etc)

* **void session_unset()**

  Buida el contingut de totes les variables de sessió actuals.
  O el que és el mateix, tanquem la sessió

* **string session_name ([string name])**

    Retorna el nom de la sessió actual. 
  Si s'especifica nom es modifica l'actual pel nou valor.

* **string session_id ([string id])**

    Retorna l'identificador de la sessió actual. 
  Si s'especifica un identificador, l'actual es modificarà pel nou valor. 

## Referències

* **w3schools.com**: [PHP 5 Sessions](https://www.w3schools.com/php/php_sessions.asp) 

* **Documentació oficial PHP.net:** [Sessions](http://php.net/manual/en/book.session.php)