# WORDPRESS PHP - Creació d'un plugin de wordpress
## DAW-MP07-UF3 - Exercici de Tècniques d'accés a dades.
La següent pràctica consisteix a crear un plugin de wordpress que permeti als usuaris fer un registre del seu creixament. L'interficie permetrà pujar una fotografia als usuaris cada dia, a través d'una pàgina privada.

![add-log](https://i.imgur.com/a/NqahWOp)

En una pàgina visible per tothom s'aniràn tots els registres diaris de cada persona ordenadament per data i agrupats per usuari.

El plugin no només guarda ordenadament les diferents imatges sinò que és s'encarrega d'aliniar i retallar les diferents imatges per tal de mostrar una transició fluïda.

## Cal tenir en compte:

1. Tant la base de dades de Wordpress com l'usuari i la contrassenya de la base de dades es diran `wordpress`. L'usuari administrador de Wordpress es dirà `admin` i `admin` serà la seva contrassenya.

1. Tots els registres es guardaran a la base de dades ja creada per [wordpress.](https://www.davidangulo.xyz/how-to-insert-data-into-wordpress-database/)

1. El plugin creat serà transportable a diferents llocs webs. Es podrà instal·lar mitjançant l'entorn gràfic i al desinstal·lar farà neteja de totes les dades creades.

1. El propi plugin crearà i esborrarà al desinstal·lar tant la pàgina pública, com la privada.

1. La detecció de cares es farà mitjançant un servidor extern. Aquest servidor disposa d'una API que us hi podeu comunicar via CURL. Per provar com funciona i obtenir la clau podeu accedir-hi [via web](http://192.168.182.10:8000/) amb les credencials facilitades per el professor.

1. Amb PHP caldrà aplicar, l'escalat, translació i rotació de l'imatge.


## Extra
1. Crea un  menú a la zona d'administració on es puguin modificar els paràmetres del plugin.



---

#FpInfor #Daw #DawMp07 #DawMp07Uf03

* Resultats d'aprenentatge 1.b 1.c 1.d 1.e
* Continguts 1.2 1.3 1.4 1.5
---

###### Autor: Aniol Lidon 2022.12.11
###### [CC BY](https://creativecommons.org/licenses/by/4.0/) ![CC BY](https://licensebuttons.net/l/by/3.0/80x15.png)