# WORDPRESS  PHP - Creació d'un connector (plugin) de WordPress 
## DAW-MP07-UF3 - Exercici de Tècniques d'accés a dades.
La següent pràctica consisteix a crear un connector de WordPress  que permeti als usuaris completar una cara d'un [quadre famós amb la seva cara](https://www.youtube.com/shorts/mz8zONZnvhE).

Els usuaris podran pujar una imatge d'un quadre i automàticament s'analitzarà els punts de la cara per fer-hi un retall que inclogui la boca i el nas. Un cop fet aquesta anàlisi s'obrirà una pàgina on veurem la nostra webcam sobre el retall. 

![Imatge1](https://i.imgur.com/U6Umfxw.jpg)
![Imatge2](https://i.imgur.com/7ELaB10.jpg)

Caldrà implementar les parts restants del connector, des de registrar el fitxer d'estil CSS fins a recollir les imatges pujades.

La composició creada pel nostre connector consta de dues capes:

+ A la capa inferior s'hi situa el vídeo en directe de la webcam de l'usuari (el codi javascript que ho permet ve donat a `assets/js/youinpaint.js`).
+ A la capa superior hi situem la imatge del quadre retallada al voltant de la cara (500x500px). Aquesta imatge té transparència en una elipse que engloba la boca i el nas. Aquests dos processos es duen a terme gràcies als resultats de l'api de detecció de cares. Caldrà implementar: els diferents retalls i la comunicació amb l'api.

## Cal tenir en compte:

1. Caldrà desplegar una aplicació WordPress  amb el plugin a la màquina isard a la ubicació `/var/www/html/WordPress `. Es crearà i s'usarà un usuari a la base de dades anomenat `WordPress ` amb contrasenya `WordPress `. L'usuari administrador de WordPress  es dirà `admin` amb contrasenya `admin`.

1. A l'entrega s'afegirà el codi GitHub i un ZIP amb el connector. Aquest serà transportable a diferents llocs web. Es podrà **instal·lar** mitjançant l'entorn gràfic i en **desinstal·lar** farà neteja de totes les dades creades.

1. El mateix connector **crearà** i **esborrarà** en desinstal·lar la pàgina creada per ell anomenada `youinpaint`.

1. La detecció de cares es farà mitjançant un servidor extern. Aquest servidor disposa d'una API que us hi podeu comunicar via CURL. Per provar com funciona i obtenir la clau podeu accedir-hi [via web](http://coma.boscdelacoma.cat:8000/login) amb les credencials facilitades pel professor.

1. Amb PHP caldrà permetre la pujada d'imatge, analitzar-la per trobar-hi els punts de la cara. Retallar-la a una mida de 500x500px. Eliminar el contingut per crear una transparència al voltant de la boca.


## Informació de servei
El servei de detecció de cares està implementat per Exadel i el codi està disponible al seu [GitHub](https://github.com/exadel-inc/CompreFace). Podeu generar-vos el vostre mateix servidor mitjançant el seu contenidor Docker.

Podeu baixar el codi a través del següent [enllaç.](https://downgit.github.io/#/home?url=https://github.com/aniollidon/gitbook-php/tree/master/activitats/DAW-MP07/DAW-MP07-UF3/WordPress -php-plugin)

## Avaluació

+ Instal·lació plugin: [1 punt]
	+ Creació Base de dades 
	+ Creació de la pàgina
    
+ Desinstal·lació plugin [1 punt]
	+ Esborrar les imatges
	+ Esborrar taula de la base de dades
	+ Esborrar les pàgines creades

+ Afegir els estils del plugin a WordPress  [0,5 punts]

+ Funcionalitat de la pàgina. [1 punt]
	+ Les pàgines es mostren correctament i com s'espera
	+ Les pàgines és dinàmica: es fa ús de shortcodes

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
		
+ Crear nova imatge amb la cara centrada i amb una elipse transparent entre la boca i el nas [2,5 punts]
	+ Aplicar un escalat i translació mitjançant les funcions `imagescale` i `imagecrop` retallant la imatge a 500x500.
	+ Creació d'una elipse transparent situada entre la boca i el nas del personatge del quadre àmb la funció `imagefilledellipse`.

+ Instal·lació del mateix connector al servidor Isard [1 punt]

---

#FpInfor #Daw #DawMp07 #DawMp07Uf03

* Resultats d'aprenentatge 1.b 1.c 1.d 1.e
* Continguts 1.2 1.3 1.4 1.5
---

###### Autor: Aniol Lidon 2023.14.05
###### [CC BY](https://creativecommons.org/licenses/by/4.0/) ![CC BY](https://licensebuttons.net/l/by/3.0/80x15.png)
