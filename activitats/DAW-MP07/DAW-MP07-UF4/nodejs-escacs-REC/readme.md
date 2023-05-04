# NodeJS - Resultats torneig d'escacs (REC)
## DAW-MP07-UF4 - Serveis web. Pàgines dinàmiques interactives. Webs Híbrids.
**Objectiu**:

Crear una API per una aplicació que gestioni les puntuacions d'un torneig d'escacs. 

**A desenvolupar**:

Aquesta aplicació registra múltiples jugadors i les diferents partides (jocs) realitzats. Dels jugadors, en volem saber el seu nom d'jugador i el nom complert. De cada partida (joc) guardarem quin jugador ha jugat amb cada posició (blanques, negres) i el resultat de la partida. El resultat pot ser `WHITE` si ha guanyat el jugador blanc, `BLACK` si ha guanyat el jugador negre i `DRAW` si hi ha hagut un empat. Els jugadors poden participar a diferents partides.

Tant dels jugadors com de les partides en guardarem la seva data de creació (`createdAt`) modificació (`upadatedAt`). Seguint el següent diagrama de classes:

<div style="text-align: center;">

![Chess](https://i.imgur.com/RfeJXF1.png)

</div>

L'API es troba en una de les primeres fases del desenvolupament concretament a la versió 1.

Utilitzarem CRUD a la nostra API de manera que esperem que ens facin GET, POST, PATCH i DELETE a les nostres rutes.

Hem d'habilitar les següents rutes:

```js
POST /api/v1/jugadors // Afegir un jugador
POST /api/v1/partides // Afegir una partida

GET /api/v1/jugadors // Obtenir tots els jugadors
GET /api/v1/partides // Obtenir totes les partides

GET /api/v1/jugadors/[ID] // Obtenir la informació d'un jugadors específic
GET /api/v1/partides/[ID] // Obtenir la informació d'una partida específica

PATCH /api/v1/jugadors/[ID] // Modificar un jugador
PATCH /api/v1/partides/[ID] // Modificar una partida

DELETE /api/v1/jugadors/[ID] // Esborrar un jugador
DELETE /api/v1/partides/[ID] // Esborrar una partida

GET /api/v1/jugadors/[ID]/partides // Obtenir la llista completa de totes les partides que ha participat un jugador específic.

GET /api/v1/jugadors/[ID]/partides?posicio=[WHITE|BLACK] // Filtrar les partides d'un jugador en funció de la posició en la que ha jugat
GET /api/v1/jugadors/[ID]/partides?data=[DATA] // Filtrar les partides d'un jugador en funció de la data d'aquestes
GET /api/v1/jugadors/[ID]/partides?posicio=[WHITE|BLACK]&data=[DATA] // Combinar els filtres anteriors per obtenir una llista de partides que compleixen ambdós filtres
```

Per fer la pràctica caldrà seguir el [tutorial de bones pràctiques](https://www.freecodecamp.org/news/rest-api-design-best-practices-build-a-rest-api). 

**A tenir en compte**:
1. La pràctica es presentarà a la màquina isard facilitada pel professor. Podeu fer el desenvolupament en local i pujar-ho a a la màquina remota. 
1. S'ha d'afegir un fitxer insomnia o postman on **es provi la funcionalitat esperada** de cada una de les rutes. (hi ha d'haver més d'una prova per ruta). Aquest fitxer es trobarà a `/home/isard/escacsUF2`
1. Es pot fer servir el gestor de base de dades que es desitgi, es recomana fer servir [SQLite](https://www.sqlitetutorial.net/) (així no caldrà instal·lar res al servidor). Assegureu-vos que la base de dades estigui en blanc.
1. El professor posarà NOMÉS la comanda `npm start` al home (`/home/isard/escacsUF2`) de la màquina isard. Assegureu-vos que el vostre codi estigui en aquella ruta. 
1. Recorda:
    + Seguir les convencions de noms que definiex el tutorial i que s'ajusta al que utilitza la comunitat.
    + Utilitzar ids generades aleatòriament evitant que s'accedeixi a dades que no toca.
    + Respondre i acceptar les peticions amb format JSON.
    + Afegir els camps "createdAt" and "updatedAt" quan es respon una consulta.
    + Respondre amb la [convensió estàndard de codis HTTP](https://restfulapi.net/http-status-codes/).
    + Validar TOTES les dades que t'arriben de front-end.
    + Documentar correctament l'API utilitzant Swagger.

**No s'ha de fer**:

1. No s'ha d'afegir caché a la nostra API.
1. No s'ha d'afegir metodes d'auntentificació/autorització.

**Avaluació:**

1. Fer un bon desplegament a la màquina Isard. (1 punt)
1. Afegir un exemple d'ús de cada una de les funcionalitats i implementar la funcionalitat esperada. (6 punts)
1. Definir les rutes amb la terminologia adequada seguint les bones pràctiques. (0.5 punts)    
1. Estructurar correctament el codi en les carpetes i fitxers que s'esperen. (0.5 punts)
1. Utilitzar noms de variables i funcions adequats a les bones pràctiques. (0.5 punts)
1. Respondre correctament les peticions, comprovar-ne les dades entrants i anonimitzar les IDs entrants. (1 punt)
1. Fer una bona documentació amb SWAGGER.
---

#FpInfor #Daw #DawMp07 #DawMp07Uf04

---

###### Autor: Aniol Lidon 03/05/2023
###### [CC BY](https://creativecommons.org/licenses/by/4.0/) ![CC BY](https://licensebuttons.net/l/by/3.0/80x15.png)