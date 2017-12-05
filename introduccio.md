# Introducció al Llenguatge PHP

**PHP** és un llenguatge per generar codi HTML.

De fet, les sigles PHP signifiquen "***PHP: Hypertext Preprocessor"*** (definició recursiva).

Els arxius **PHP** combinen codi HTML i PHP:

  * Els scripts **PHP** són processats pel servidor (pot ser l'Apache)
  * El resultat generat (codi HTML) s'envia al client.

![php](https://sdz-upload.s3.amazonaws.com/prod/upload/p1ch1_JavaScript%20client%20-%20New%20Page.png)

## Entorn client vs entorn servidor

* Un **llenguatge és entorn client** quan l'irtèrpret que ha d'executar els scripts és accessible des del client sense fer cap petició al servidor.
  * Per exemple, **_Javascript_**. 	
  
  
* Un **llenguatge és entorn servidor** quan l'execució dels scripts s'efectua al sevidor abans d'enviar la resposta al client.
  * Per exemple, **_PHP_**.
  * El client **no** rep el codi PHP, només rep el codi HTML generat al servidor.

## Requisits per a l'ús del llenguatge PHP

**PHP** requereix tenir instal·lat:
* Un programari de servidor que suporti el protocol HTTP i configurat per interactuar amb l'intèrpret PHP.
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

