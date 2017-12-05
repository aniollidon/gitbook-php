# Cookies

## Protocol HTTP

* El  **protocol http** és un [protocol sense estat (*stateless*)](https://es.wikipedia.org/wiki/Protocolo_sin_estado).
* Es tracta cada petició com un transacció independent que no té relació amb cap altre petició anterior.
* S'han creat tècniques per mantenir informació entre peticions.
* Una d'aquestes tècniques són les [**cookies**](http://php.net/manual/es/features.cookies.php)

## Cookies

* Una *galeta* o ***cookie*** és un fitxer de text de mida limitada que permet guardar localment informacions diverses.
* La finalitat és guardar informació d'un visitant **en el seu ordinador** per poder utilitzar en futures visites.
  * Per exemple: data i hora última visita, nom d'usuaris, etc.
* Cal que el navegador tingui les **cookies habilitades**.

## Crear cookies

```php
setcookie(name, value, expire)
```
* El **temps d'expiració** s'expressa amb segons.
* Exemple:

```php
<? php
setcookie("user", "sergi", time() + (30 * 24 * 3600)); 
// Expiració = 30 dies (30d * 24h * 3600s)
?>
```
* **Important!!!** quan volguem enviar una cookie hem de començar el codi php just al començament del fitxer, abans de qualsevol etiqueta html o espai en blanc.

## Recuperar cookies
* Per recuperar els valors desats en **cookies** s'utilitzar l'array associatiu `$_COOKIE["nom_cookie"]`

```php
<?php
if(!isset($_COOKIE["user"])) {
    echo "La cookie amb nom 'user' no existeix!";
} else {
    echo "Benvingut " . $_COOKIE["user"];
}
?>
```

---