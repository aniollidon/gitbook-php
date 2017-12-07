<!-- notoc -->

# Introducció al Llenguatge PHP

> **PHP** és un llenguatge de scripting open source per generar codi HTML.

> **Scripts**: conjunt d'instruccions escrites en un llenguatge determinat que, en el cas de PHP, van incrustades dintre d'una pàgina WEB.

Les sigles PHP signifiquen ***PHP: Hypertext Preprocessor*** (definició recursiva).

Els arxius **PHP** combinen codi HTML i PHP:

  * Els scripts **PHP** són processats pel servidor (com pot ser Apache, IIS, etc).
  * El resultat generat (codi HTML) s'envia al client i és processat pel navegador web.

![php](https://sdz-upload.s3.amazonaws.com/prod/upload/p1ch1_JavaScript%20client%20-%20New%20Page.png)

## LLENGUATGES DE PROGRAMACIÓ DE LA WEB

Els llenguatges de script poden classificar-se en dos tipus:

> Un **llenguatge és entorn client** quan l'intèrpret que ha d'executar els scripts és accessible des del client sense fer cap petició al servidor.

* El usuaris podran veure els scripts, bé sigui de forma directa (mirant el codi font de la pàgina rebuda) o llegint el contingut de fitxers externs vinculats.
* **_Javascript_** és el més popular. 	
  
  
> Un **llenguatge és entorn servidor** quan l'execució dels scripts s'efectua al servidor abans d'enviar la resposta al client. 

* El client **no** rep el codi PHP original, només rep el codi HTML generat al servidor.
* Els usuaris no podran veure el codi font.
* Per exemple, **_PHP_**.


## Requisits per a l'ús del llenguatge PHP

**PHP** requereix tenir instal·lat:
* Un servidor web que suporti el protocol HTTP i configurat per interactuar amb l'intèrpret PHP.
	* Per exemple, l'Apache.
* Un **intèrpret de PHP**.

## Treballant amb Apache i Linux

En **_Ubuntu_** o **_Debian_** podem instal·lar els paquets necessaris amb:

```
$ sudo apt-get install apache2 php5 mysql-server phpmyadmin
```

## Treballant amb Apache i Windows

Es recomana instal·lar el **_WAMPP_** o **_XAMPP for Windows_**.

http://www.apachefriends.org/en/xampp-windows.html

* Aquest paquet ho porta tot integrat: Apache, PHP5 i MySQL.
* Els arxius \*.php els haureu de guardar al directori htdocs (del Apache).

A la web oficial de PHP (**PHP.net**) trobareu instruccions d'instal·lació de PHP: [http://php.net/manual/en/install.php](http://php.net/manual/en/install.php)