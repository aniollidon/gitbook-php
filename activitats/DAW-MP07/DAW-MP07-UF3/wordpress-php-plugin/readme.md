# WORDPRESS PHP - Creació d'un connector (plugin) de wordpress
## DAW-MP07-UF3 - Exercici de Tècniques d'accés a dades.
La següent pràctica consisteix a crear un connector de wordpress que permeti als usuaris fer un [registre del seu creixement](https://www.youtube.com/watch?v=65nfbW-27ps). La interfície permetrà pujar una fotografia als usuaris cada dia, a través d'una pàgina privada.
![add-log](https://i.imgur.com/ANMEvoJ.png)

En una pàgina visible per tothom es mostraran tots els registres diaris de cada persona ordenadament per data i agrupats per usuari.

El connector no només guarda ordenadament les diferents imatges sinó que també s'encarrega d'alinear i retallar les diferents imatges per tal de mostrar una transició fluida.

Caldrà implementar les parts restants del connector, des de registrar el fitxer d'estil CSS fins a recollir les imatges pujades i realitzar les insercions a la base de dades.

## Cal tenir en compte:

1. Tant la base de dades de WordPress com l'usuari i la contrasenya de la base de dades es diran 'wordpress'. L'usuari administrador de WordPress es dirà 'admin' i 'admin' serà la seva contrasenya.

1. Tots els registres es guardaran a la base de dades ja creada per [wordpress.](https://www.davidangulo.xyz/how-to-insert-data-into-wordpress-database/)

1. El connector creat serà transportable a diferents llocs web. Es podrà instal·lar mitjançant l'entorn gràfic i en desinstal·lar farà neteja de totes les dades creades.

1. El mateix connector crearà i esborrarà en desinstal·lar tant la pàgina pública, com la privada.

1. La detecció de cares es farà mitjançant un servidor extern. Aquest servidor disposa d'una API que us hi podeu comunicar via CURL. Per provar com funciona i obtenir la clau podeu accedir-hi [via web](http://172.24.200.10:8000/login) amb les credencials facilitades pel professor.

1. Amb PHP caldrà aplicar l'escalat, translació i rotació de la imatge.

## Extra
1. Crea un menú a la zona d'administració on es puguin modificar els paràmetres del connector.

## Informació de servei
El servei de detecció de cares està implementat per Exadel i el codi està disponible al seu [GitHub](https://github.com/exadel-inc/CompreFace). Podeu generar-vos el vostre mateix servidor mitjançant el seu contenidor Docker.

Podeu baixar el codi a través del següent [enllaç.](https://downgit.github.io/#/home?url=https://github.com/aniollidon/gitbook-php/tree/master/activitats/DAW-MP07/DAW-MP07-UF3/wordpress-php-plugin)

## Avaluació



+ Instal·lació plugin: Creació Base de dades [0,5 punts]
	+ Crear les dues pàgines (`log` i `add-log`)
    
+ Desinstal·lació plugin [1 punt]
	+ Esborrar les imatges
	+ Esborrar taula de la base de dades
	+ Esborrar les pàgines creades

+ Afegir els estils del plugin a wordpress [0,5 punts]

+ Funcionalitat de les dues pàgines. [1 punt]
	+ Les pàgines es mostren correctament i com s'espera
	+ La pàgina d'afegir log és privada.
	+ Les pàgines són dinàmiques: es fa ús de shortcodes en elles

+ Pujar una imatge al servidor [1 punt]
	+ Guardar correctament la imatge
	+ Manegar els diferents errors possibles: 
		+ El fitxer no és una imatge
		+ El fitxer no té l'extenció adequada
		+ El fitxer pesa massa
		+ Error al moure el fitxer
		+ Altres ... 

+ Inserir correctament els registres a la base de dades [1 punt]

+ Detecció de cares:  [1 punt]
	+ Fer ús de CURL per comunicar-se amb el servidor
	+ Agafar les dades correctes
	+ Demanar-li al servidor les dades mínimes.
	+ Manegar els diferents errors possibles:
		+ Errors del mateix detector
		+ Errors per mala connexió
		+ Apareix més d'una persona a l'imatge
		+ Altres ...
		
+ Crear nova imatge normalitzada a partir de la detecció de cares [2 punts]
	+ Normalitzar la rotació
	+ Normalitzar l'escalat
	+ Normalitzar la translació mitjançant la funció `Crop`.

+ Bona estructura de fitxers, codi ben comentat, noms adequats. [1 punt]

+ Instal·lació del mateix connector al servidor de l'institut [1 punt]

+ EXTRA: [+1 punt]
	+ Afegir menús de configuració
	+ Ús d'opcions per les diferents configuracions







---

#FpInfor #Daw #DawMp07 #DawMp07Uf03

* Resultats d'aprenentatge 1.b 1.c 1.d 1.e
* Continguts 1.2 1.3 1.4 1.5
---

###### Autor: Aniol Lidon 2022.12.11
###### [CC BY](https://creativecommons.org/licenses/by/4.0/) ![CC BY](https://licensebuttons.net/l/by/3.0/80x15.png)
