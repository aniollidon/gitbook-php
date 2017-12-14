<!-- notoc -->

# Introducció al Llenguatge PHP

> **PHP** és un llenguatge de scripting open source per generar codi HTML.

> **Scripts**: conjunt d'instruccions escrites en un llenguatge determinat que, en el cas de PHP, van incrustades dintre d'una pàgina WEB.

Les sigles PHP signifiquen ***PHP: Hypertext Preprocessor*** (definició recursiva).

Els arxius **PHP** combinen codi HTML i PHP:

  * Els scripts **PHP** són processats pel servidor (com pot ser Apache, IIS, etc).
  * El resultat generat (codi HTML) s'envia al client i és processat pel navegador web.

![php](https://sdz-upload.s3.amazonaws.com/prod/upload/p1ch1_JavaScript%20client%20-%20New%20Page.png)

## Llenguatges de programació de la web

Els llenguatges de script poden classificar-se en dos tipus:

> Un **llenguatge és entorn client** quan l'intèrpret que ha d'executar els scripts és accessible des del client sense fer cap petició al servidor.

* El usuaris podran veure els scripts, bé sigui de forma directa (mirant el codi font de la pàgina rebuda) o llegint el contingut de fitxers externs vinculats.
* **_Javascript_** és el més popular. 	
  
  
> Un **llenguatge és entorn servidor** quan l'execució dels scripts s'efectua al servidor abans d'enviar la resposta al client. 

* El client (el navegador web) **no** rep el codi PHP original, només rep el codi HTML generat al servidor.
* Els usuaris no podran veure el codi font.
* Per exemple, **_PHP_**.


## Comportament del servidor

En uns casos el servidor ha de **lliurar el document original** (pàgines HTML que poden tenir scripts amb llenguatges del costat del client).

Mentre que en altres casos ha de **retornar el resultat de l'execució dels scripts** (pàgines dinàmiques usant llenguatges del costat del servidor).

Per tal que el servidor conegui què ha de fer en cada cas, cal indicar-li mitjançant l'**extensió del document**.

* Si en la petició es demana a un document amb extensió **_.htm_** o **_.html_** el servidor entendrà que aquesta pàgina no requereix la intervenció prèvia de cap intèrpret del costat del seridor i entregarà la pàgina tal qual.

* En canvi amb l’extensió **_.php_** el codi PHP serà executat i substituït per la seva sortida (codi HTML generat) en el document HTML que s'envia al client (navegador).

## Requisits per a l'ús del llenguatge PHP

**PHP** requereix tenir instal·lat:
* Un servidor web que suporti el protocol HTTP i configurat per interactuar amb l'intèrpret PHP. Per exemple, l'**_Apache_**.
* Un **intèrpret de PHP**.
* Opcionalment, un programari de **servidor de bases de dades** capaç de ser gestionat mitjançant funcions pròpies de PHP (MySQL, Oracle, etc).


## Treballant amb Apache i Linux

En **_Ubuntu_** o **_Debian_** podem instal·lar els paquets necessaris amb:

```
$ sudo apt-get install apache2 php7.0 libapache2-mod-php7.0 mysql-server phpmyadmin
```

O bé instal·lar **_XAMPP for Linux_**

https://www.apachefriends.org/es/index.html

## Treballant amb Apache i Windows

Es recomana instal·lar el **_WAMPP_** o **_XAMPP for Windows_**.

https://www.apachefriends.org/es/index.html

* Aquest paquet ho porta tot integrat: Apache + MariaDB + PHP7 + Perl.
* Els arxius \*.php els haureu de guardar al directori htdocs (del Apache).

A la web oficial de PHP (**PHP.net**) trobareu instruccions d'instal·lació de PHP: [http://php.net/manual/en/install.php](http://php.net/manual/en/install.php)