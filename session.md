<!-- notoc -->

# *Sessions

Hem vist que els **cookies** ens permetien mantenir una informació de variables més enllà d'un únic script. 

Però tenen alguns **inconvenients**:
* Cal que el navegador tingui aquesta opció habilitada.
* Es desa en l'ordinador local o client.

Per tant, si l'usuari deshabilita aquesta possibilitat, es tanca la porta a aquest manteniment de valors entre scripts. 

**PHP** proporciona un altre mecanisme per mantenir la sessió: les **variables de sessió**.

> Les **variables de sessió** són variables que estan disponibles a qualsevol lloc dels scripts i en totes les pàgines **mentre la sessió no s'acabi**. 

Una **sessió comença** quan l'usuari es connecta a l'aplicació.
Una **sessió es tanca** quan:
  * L'usuari tanqui el navegador.
  * Passa un cert temps (definit pel sistema) sense que l'usuari interaccioni amb l'aplicació.

Les variables de sessió, a diferència de les cookies, **es guarden al servidor**.

## Creació de la sessió

**pagina1.php**

```html
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
?>
</body>
</html>
```

## Recuperació variables de sessió

**pagina2.php**

```html
<?php
// Restart de session
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>
</body>
</html>
```