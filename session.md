# Sessions

PHP proporciona un altre mecanisme per mantenir la sessió : les **variables de sessió**.

Són variables que estan disponibles a qualsevol lloc dels scripts i en totes les pàgines **mentre la sessió no s'acabi**. Un sessió es tanca quan:
  * L'usuari no tanqui el navegador.
  * Passa un cert temps (definit pel sistema) sense que l'usuari interaccioni.

Les variables de sessió, a diferència de les cookies, **es guarden al servidor**.

## Creació de la sessió

pagina1.php
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

pagina2.php
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