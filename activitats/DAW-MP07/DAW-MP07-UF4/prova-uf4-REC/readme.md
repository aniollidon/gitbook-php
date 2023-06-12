# Node - PROVA UF4. Segona convocatòria - Implementació d'un sistema de gestió de vols.
## DAW-MP07-UF4 - Serveis web. Pàgines dinàmiques interactives. Webs Híbrids.

**Objectiu**:

Crear una API per una aplicació que permeti gestionar els diferents vols i els bitllets dels avions.

**A desenvolupar:**

Aquesta aplicació registra els diferents bitllets venuts dels vols d'una aerolínia. De cada vol en volem saber l'identificador de vol, l'origen, el destí, la data i hora d'enlairament, el model d'avió i la durada del trajecte. De cada bitllet en guardarem el vol al qual pertany, el DNI de la persona titular del bitllet, el nom complet de la persona titular, el seient assignat i la classe del passatger (primera classe, classe executiva, classe econòmica).

Tant dels vols com dels bitllets en guardarem la seva data de creació (`createdAt`) modificació (`upadatedAt`). Seguint el següent diagrama de classes:

![Classes](db.jpg)

L'API es troba en una de les primeres fases del desenvolupament concretament a la versió 1.3.

S'han de proporcionar les funcionalitats següents:
+ Crear rutes amb els següents mètodes [CRUD]:  
    + Afegir un bitllet.
    + Afegir un vol.
    + Obtenir tots els vols.
    + Obtenir informació d'un bitllet específic mitjançant l'ID.
    + Modificar un bitllet.
    + Esborrar un bitllet.
+ Una ruta que creui informació de les dues taules:
    + Obtenir la llista completa de tots els bitllets d'un vol específic.
+ Afegir filtres a aquesta última ruta amb els bitllets d'un vol:
    + Filtrar els bitllets per la classe del passatger.
    + Filtrar els bitllets creats (comprats) abans d'una data en concret.
    + Combinar els filtres anteriors per obtenir una llista de bitllets que compleixen ambdós filtres.
+ Eliminar un vol. (Cal evitar-ne l'esborrat si aquest té bitllets associats)


**A tenir en compte**:
1. L'examen es presentarà a la màquina isard facilitada pel professor. Podeu fer el desenvolupament en local i pujar-ho a la màquina remota. 
1. S'ha d'afegir un fitxer insomnia o postman on es provi la funcionalitat esperada de cada una de les rutes. (hi ha d'haver més d'una prova per ruta). Aquest fitxer es trobarà a `/home/isard/provauf4-2conv`
1. Es pot fer servir el gestor de base de dades que es desitgi, es recomana fer servir [SQLite](https://www.sqlitetutorial.net/) (així no caldrà instal·lar res al servidor). Assegureu-vos que la base de dades estigui en blanc.
1. El professor posarà NOMÉS la comanda `npm start` a la carpeta `/home/isard/provauf4-2conv` de la màquina isard. Assegureu-vos que el vostre codi estigui en aquella ruta. 
1. Caldrà seguir les bones pràctiques que hem vist durant el curs.

**No s'ha de fer:**:
1. No s'ha d'afegir caché a la nostra API.
1. No s'ha d'afegir mètodes d'autentificació/autorització.
1. No s'ha de documentar l'API. Que això no vol dir que el codi no tingui comentaris.

**Avaluació:**
1. Fer un bon desplegament a la màquina Isard. (1 punt)
1. Afegir un exemple d'ús de cada una de les funcionalitats i implementar la funcionalitat esperada (6 punts)
    + Implementar les 6 rutes CRUD 
    + Implementar la ruta creuada 
    + Aplicar filtres a la ruta creuada 
    + Implementar l'eliminació d'un usuari de forma controlada 
1. Definir les rutes amb la terminologia adequada seguint les bones pràctiques. (0.5 punts)    
1. Estructurar correctament el codi en les carpetes i fitxers que s'esperen. (0.5 punts)
1. Utilitzar noms de variables i funcions adequats a les bones pràctiques. (0.5 punts)
1. Respondre correctament les peticions, comprovar-ne les dades entrants i anonimitzar les IDs entrants. (1.5 punts)
---

#FpInfor #Daw #DawMp07 #DawMp07Uf04

---

###### Autor: Aniol Lidon 2022.07.06
###### [CC BY](https://creativecommons.org/licenses/by/4.0/) ![CC BY](https://licensebuttons.net/l/by/3.0/80x15.png)