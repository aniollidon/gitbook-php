<!-- notoc -->

# Cookies

## Protocol HTTP

> El  **protocol http** és un [protocol sense estat (*stateless*)](https://es.wikipedia.org/wiki/Protocolo_sin_estado).

Per tant, es tracta cada petició d'una pàgina com un transacció independent que **no té relació** amb cap altre petició anterior.

S'han creat tècniques per **mantenir informació entre peticions**, com per exemple les [**cookies**](http://php.net/manual/es/features.cookies.php)

## Cookie

> Una *galeta* o ***cookie*** és un fitxer de text de mida limitada que permet guardar localment (en l'equip client) informacions diverses.

La **finalitat** és guardar informació d'un visitant, **en el seu ordinador**, per poder-les recuperar i utilitzar en futures visites.
 
Per exemple: data i hora última visita, nom d'usuari, etc.

Totes els cookies d'un mateix web es guarden seqüencialment en un mateix fitxer de text.

> Cal que el navegador tingui les **cookies habilitades**.

## Funcionament

1. El **client** sol·licita una pàgina per primera vegada
2. La **cookie** és enviada del servidor al client (sempre i quan el client accepti galetes) i es guarda en el disc dur.
3. Cada vegada que el mateix equip accedeix a la pàgina web, si la cookie no ha caducat, **s'envia també la cookie** al servidor per recuperar les dades.

![](/assets/php-cookies.png)

## Crear cookies

Una **cookie** es crea amb la funció **setcookie()**.

```php
setcookie(nom, valor, expiració)
```

**Exemple**

```php
<? php
  $cookie_name = "user";
  $cookie_value = "Sergi";
  setcookie($cookie_name, $cookie_value, time() + (30 * 24 * 3600)); 
  // Expiració = 30 dies (30d * 24h * 3600s)
?>
```

[Provar l'exemple](https://www.w3schools.com/php/showphp.asp?filename=demo_cookie1)

*  **_nom_**: és el nom o l’identificador amb què ens referirem a aquella cookie.
*  **_valor_**: és el valor concret que li donem a aquella cookie.
*  **_temps d'expiració_**: és un data expressada amb segons (nombre enter), per això és útil fer servir la funció **_time()_** de PHP.
* **_domini_**: estableix el domini per al qual la cookie serà vàlida.

Només el **name** és obligatori, els altres paràmetres són opcionals.

* El **temps d'expiració** s'expressa amb segons.


> **Important!!!** quan volguem enviar una cookie hem de començar el codi php just al començament del fitxer, abans de qualsevol etiqueta html o espai en blanc.

## Recuperar cookies

Per recuperar els valors desats en **cookies** s'utilitzar l'array associatiu `$_COOKIE["nom_cookie"]`.

```php
<?php
  if(!isset($_COOKIE["user"])) {
      echo "La cookie amb nom 'user' no existeix!";
  } else {
      echo "Benvingut " . $_COOKIE["user"];
  }
?>
```

## Eliminar cookies

Per eliminar una **cookie** s'utilitza la funció **setcookie()** amb una data d'expiració anterior al temps actual.

```php
<?php
  // posem un data d'expiració una hora enrera
  setcookie("user", "", time() - 3600);
?>
```

