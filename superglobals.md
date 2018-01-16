<!-- notoc -->



# Variables globals (Superglobals)

> PHP disposa d'un conjunt de **variables globals predefinides (superglobals)** que guarden informació relativa a l'entorn d'execució i a la configuració del php. Per tant, dependràn del servidor on estan instal·lades. 

Per veure-les es pot utilitzar la funció `phpinfo();`

Aquestes variables PHP són "**_superglobals_**" i per tant s'hi pot accedir des de qualsevol lloc del nostre codi.

## Algunes variables

  **$GLOBALS**: variables disponibles en l’àmbit global. [Exemple](https://www.w3schools.com/php/showphp.asp?filename=demo_global_global)

**$_SERVER**: informació del servidor i l’entorn d’execució. [Exemple](https://www.w3schools.com/php/showphp.asp?filename=demo_global_server)

**$_GET**: array associatiu que conté les dades enviades per un formulari mitjançant el mètode GET.

**$_POST**: array associatiu que conté les dades enviades per un formulari mitjançant el mètode POST.

**$_SESSION**: array associatiu que conté les variables de sessió.

**$_ENV**: array associatiu que conté les variables d’entorn.

**$argc**: número d’arguments (paràmetres) passats a la funció.

**$argv**: array associatiu d'argument passats en la crida a la funció.
	
## Per accedir als diferents valors de les superglobals 

`$<Superglobal>['<key>']`

**Exemple**: `$_SERVER['SERVER_ADDR']`
