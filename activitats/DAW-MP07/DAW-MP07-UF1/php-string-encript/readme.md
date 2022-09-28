# PHP - Encriptació d'Strings
## DAW-MP07-UF1 - Exercici de Desenvolupament web en entorn servidor.
En un fitxer del servidor ens trobem amb el següent codi. Sabem que les dues cadenes de caràcters s'han encriptat mitjançant la següent codificació:

1. Es divideix el text amb cadenes de 3 caràcters. A cada tercet s'inverteix l'ordre dels caràcters, de manera que "abc" passa a ser "cba".
2. Remplecem els caràcters alfabètics per el seu oposat, de manera que 'a' passa a ser 'z', 'b' passa a ser 'y'... Els caràcters no alfabètics es mantenen.

```php
<?php

$sp = "kfhxivrozziuortghrvxrrkcrozxlwflrh";
$mr = " hv ovxozwozv vj o vfrfjvivfj h vmzvlo e hrxvhlmov oz ozx.vw z xve hv loqvn il hv lmnlg izxvwrhrvml ,hv b lh mv,rhhv mf w zrxvlrh.m";


echo decrypt($sp);
echo "<br>";
echo decript($mr);


?>
```

### Activitats
 1. Crea la funció per desencriptar els diferents textos. _Recomenable fer una ullada a les [funcions de tractament d'strings](https://www.php.net/manual/en/book.strings.php)_
 2. El sistema proposat per encriptar és poc segur i una mica rudimentàri. Busca una solució segura per encriptar i desencriptar text amb php. Explica breument com funciona, i mostra un exemple del seu funcionament.
 3. Crea una técnica d'encriptament i desencriptament pròpia i original que compleixi els diferents requisits:
    + Ha de funcionar per qualsevol caràcter UTF8.
    + El text encriptat resultant contindrà només caràcters alfanumérics. 
    + El sistema d'encriptació ha de dependre de l'IP d'accés, de manera que amb una IP diferent no hauriem de ser capaços d'obtenir el text encriptat.

###### Autor: Aniol Lidon Baulida
###### [CC BY](https://creativecommons.org/licenses/by/4.0/) ![CC BY](https://licensebuttons.net/l/by/3.0/80x15.png)
