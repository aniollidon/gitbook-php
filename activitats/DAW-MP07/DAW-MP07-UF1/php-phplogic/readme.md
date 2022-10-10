# PHP - PHPLògic - Joc amb formularis i sessions
## DAW-MP07-UF1 - Exercici de Desenvolupament web en entorn servidor.
Crea un [joc del Paraulògic](https://ca.wikipedia.org/wiki/Paraul%C3%B2gic) amb PHP sobre les [funcions disponibles](https://www.php.net/manual/en/indexes.functions.php) a PHP.

Guia:

1. A partir dels fitxers `index.php` i `style.css` dona-li al joc funcionalitat. De manera que les solucions no siguin visibles per l'usuari.
    + No poden aparèixer errors o warnings de PHP.
    + No hi ha d'haver funcionalitat repetida.
2. Cal convertir el codi HTML per enviar el text introduït en forma de POST.
3. Cal utilitzar el patró PGR en la implementació tal com vam veure a l'[exercici anterior](/activitats/DAW-MP07/DAW-MP07-UF1/php-el-patro-pgr-postredirectget).
    + Crea el fitxer `process.php` i usa'l per calcular les solucions.
4. S'ha de fer ús de sessions per tal de mantenir l'hexàgon de lletres i les respostes encertades.
5. L'hexàgon s'ha de generar automàticament quan la sessió no estigui activa i aquest ha de dependre de la data d'avui. 
    + Cada dia a les 12 de la nit s'esborraran les respostes i es generarà un nou hexàgon.
    + Els hexàgons cada dia són diferents. Dona un cop d'ull a la funció [srand](https://www.php.net/manual/en/function.srand.php).
6. Els hexàgons proposats han de tenir com a mínim 3 respostes possibles.
    + (EXTRA) Ha de tenir un mínim de 10 respostes possibles i s'ha d'implementar de forma eficient (menys de mig segon per calcular-ho).
7. Cal afegir els mètodes GET: `data`, `sol`, `neteja`. Per generar la data d'un joc diferent del d'avui, mostrar les solucions, i per netejar les respostes.
8. Cal mostrar els següents errors:
    + Falta la lletra del mig.
    + La paraula no és una funció de PHP. (Mostrar nom en vermell)
    + Ja hi és (ja hi ha la resposta)
9. Cal modificar l'`scoreboard` tot mostrant en nombre de funcions trobades i quines són.
10. (EXTRA) Cal implementar la funcionalitat del botó de barreja. I l'hexàgon s'haurà de mostrar de la nova manera durant tot el dia.
    + No es modifica la lletra del mig
11. (EXTRA) Modifica el codi JavaScript i que es pugui introduir les tecles també per teclat. També ha de funcionar ENTER i BACKSPACE

---

#FpInfor #Daw #DawMp07 #DawMp07Uf01

---

###### Autor: Aniol Lidon Baulida 2022.10.10
###### [CC BY](https://creativecommons.org/licenses/by/4.0/) ![CC BY](https://licensebuttons.net/l/by/3.0/80x15.png)


