# Variables globals (Superglobals)

PHP disposa d'un conjunt de **variables predefinides** que guarden informació relativa a l'entorn d'execució i a la configuració del php. Per tant, dependràn del servidor on estan instal·lades. 

Per veure-les es pot utilitzar la funció `phpinfo();`

**Algunes variables:**

* **$GLOBALS**: variables disponibles en l’àmbit global
* **$_SERVER**: informació del servidor i l’entorn d’execució
* **$_GET**: array associatiu que conté les dades passades en el mètode GET
* **$_POST**: array associatiu que conté les dades passades en el mètode POST
* **$_SESSION**: array associatiu que conté les variables de sessió
* **$_ENV**: array associatiu que conté les variables d’entorn
* **$argc**: número d’arguments (paràmetres) passats al guió
* **$argv**: array associatiu d’argument passats en la crida
	
**Nota:** per accedir als diferents valors dels arrays associatius 

Exemple: `$_SERVER[‘SERVER_ADDR’]`
