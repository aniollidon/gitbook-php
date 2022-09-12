# Introducció

## Introducció al Llenguatge PHP

> **PHP** és un llenguatge de programació open source molt popular i adequat pel desenvolupament web ja que permet generar documents HTML.

Les sigles PHP signifiquen _**PHP: Hypertext Preprocessor**_ (definició recursiva).

La última versió de PHP és **PHP 8**.

Els arxius **PHP** combinen codi HTML i PHP:

```html
<!DOCTYPE HTML>
<html>
    <head>
        <title>Ejemplo</title>
    </head>
    <body>
        <?php
            echo "¡Hola, sóc un script de PHP!";
        ?>
    </body>
</html>
```

> **Scripts**: conjunt d'instruccions escrites en un llenguatge determinat que, en el cas de PHP, van incrustades dintre d'una pàgina WEB.

* Els scripts **PHP** són interpretats pel servidor web (com pot ser Apache, IIS, etc) utilitzant un mòdul de processament de PHP que genera el HTML resultant.
* El resultat generat (codi HTML) s'envia al client i és processat pel navegador web.

![php](https://sdz-upload.s3.amazonaws.com/prod/upload/p1ch1\_JavaScript%20client%20-%20New%20Page.png)

_**Més informació:**_ [php.net: Què és PHP?](http://php.net/manual/es/intro-whatis.php)

### Llenguatges de programació de la web

Els llenguatges de script poden classificar-se en dos tipus:

> Un **llenguatge és entorn client** quan l'intèrpret que ha d'executar els scripts és accessible des del client sense fer cap petició al servidor.

* El usuaris podran veure els scripts, bé sigui de forma directa (mirant el codi font de la pàgina rebuda) o llegint el contingut de fitxers externs vinculats.
* _**Javascript**_ és el més popular.

> Un **llenguatge és entorn servidor** quan l'execució dels scripts s'efectua al servidor abans d'enviar la resposta al client.

* El client (el navegador web) **no** rep el codi PHP original, només rep el codi HTML generat al servidor.
* Els usuaris no podran veure el codi font.
* Per exemple, _**PHP**_.

### Comportament del servidor

En uns casos el servidor ha de **lliurar el document original** (pàgines HTML que poden tenir scripts amb llenguatges del costat del client).

Mentre que en altres casos ha de **retornar el resultat de l'execució dels scripts** (pàgines dinàmiques usant llenguatges del costat del servidor).

Per tal que el servidor conegui què ha de fer en cada cas, cal indicar-li mitjançant l'**extensió del document**.

* Si en la petició es demana a un document amb extensió _**.htm**_ o _**.html**_ el servidor entendrà que aquesta pàgina no requereix la intervenció prèvia de cap intèrpret del costat del seridor i entregarà la pàgina tal qual.
* En canvi amb l’extensió _**.php**_ el codi PHP serà executat i substituït per la seva sortida (codi HTML generat) en el document HTML que s'envia al client (navegador).

### Requisits per a l'ús del llenguatge PHP

**PHP** requereix tenir instal·lat:

* Un servidor web que suporti el protocol HTTP i configurat per interactuar amb l'intèrpret PHP. Per exemple, l'_**Apache**_, _**IIS**_.
* Un **intèrpret de PHP**.
* Opcionalment, un programari de **servidor de bases de dades** capaç de ser gestionat mitjançant funcions pròpies de PHP (MySQL, Oracle, etc).

### Treballant amb Apache i Linux

En _**Ubuntu**_ o _**Debian**_ podem instal·lar els paquets necessaris amb:

```
$ sudo apt-get install apache2 php7.0 libapache2-mod-php7.0 mysql-server phpmyadmin
```

O bé instal·lar _**XAMPP for Linux**_

https://www.apachefriends.org/es/index.html

### Treballant amb Apache i Windows

Es recomana instal·lar el _**WAMPP**_ o _**XAMPP for Windows**_.

https://www.apachefriends.org/es/index.html

* Aquest paquet ho porta tot integrat: Apache + MariaDB + PHP7 + Perl.
* Els arxius \*.php els haureu de guardar al directori htdocs (del Apache).

A la web oficial de PHP (**PHP.net**) trobareu instruccions d'instal·lació de PHP: [http://php.net/manual/en/install.php](http://php.net/manual/en/install.php)
