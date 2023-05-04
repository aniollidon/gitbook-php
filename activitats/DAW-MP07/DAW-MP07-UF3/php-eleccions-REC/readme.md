# PHP - Eleccions
## DAW-MP07-UF3 - Exercici de Desenvolupament web en entorn servidor.
L'objectiu és crear un sistema per a fer el registre dels resultats electorals de les eleccions al parlament de Catalunya.

Per un costat hi haurà un formulari per introduir els resultats de cada municipi. I per una altra banda, es presentaran els resultats obtinguts a cada demarcació i els escons obtinguts per cada partit al parlament.

Per poder calcular els escons caldrà aplicar la [llei D'Hondt](https://ca.wikipedia.org/wiki/Regla_D%27Hondt). En el cas del parlament de Catalunya només participen aquells partits que superen el 3% dels vots no nuls. Cada demarcació (circumcisió/província) fa un repartiment dels escons. De manera que per exemple a la demarcació de Girona s'adjudicaran 17 diputats.

Per a fer el repartiment, s'ordenen de major a menor els vots aconseguits per candidatures. La fórmula D'Hondt consisteix a dividir els vots que ha assolit cada partit pels nombres naturals (1, 2, 3, ...) fins al nombre d'escons en joc a cada circumscripció. Els escons s'atribueixen a les candidatures amb els quocients més grans, de més a menys fins a arribar als escons en joc de la circumscripció. En cas d'empat en algun quocient, s'emporta l'escó la candidatura que té més vots en total.

## Es demana:
S'ens facilita un [codi PHP](codi/) incomplet, caldrà implementar una sèrie de funcionalitats. Caldrà també, posar en marxa una màquina MySQL, que farem servir per acabar la implementació. Es crearà un usuàri `dwes-user` amb contrasenya `dwes-pass`. El fitxer `elecions.sql` ens servirà com a punt de partida d'aquesta base de dades.

Implementa les següents funcionalitats, tot assegurant-te que el web funcioni:

1. Modifica el fitxer `db.php` tot implementant les diferents consultes SQL amb la llibreria PDO. (**5,5 punts**)
    + get_municipis (0,33 punts)
    + get_demarcacions (0,33 punts)
    + get_partits (0,33 punts)
    + find_demarcacio (0,5 punts)
    + get_vots (1 punt)
    + get_all_escons (0,5 punts)
    + count_demarcacio_with_escons (0,5 punts)
    + set_escons (1 punt)
    + set_vots (1 punt)
1. Implementa la llei D'Hondt i modifica la seva crida al fitxer `process.php` (**2 punts**).
    + Podeu utilitzar el fitxer `prova.php` per provar la funcionalitat aïllada.
1. Modifiqueu els fitxers `parlament.php` i `demarcacio.php` per tal de visualitzar correctament les dades. (**1,5 punts**)
1. Desplegament a la màquina Isard (**1 punt**)