<!-- notoc -->

# Sintaxi

## El primer PHP

Els scripts en llenguatge **PHP** s'insereixen en una pàgina **HTML**.

En **un mateix document** conviuen informacions destinades a diferents intèrprets: 
   * El **codi HTML** que ha de ser interpretat pel navegador.
   * Els **scripts PHP** que han d'ésser executats pel intèrpret de PHP. 

La manera de diferenciar els continguts és delimitar els scripts PHP marcant el seu començament amb una etiqueta d'**obertura** `<?php` i senyalant el final amb una etiqueta de **tancament** `?>`.

El que no està contingut entre aquestes etiquetes es considerarà codi **HTML**.

```html
<html>
<body>
   <h1>Primer arxiu PHP</h1>
   <?php
      echo "<p>Hola, Món</p>";
   ?>
</body>
</html>
```

* La **instrucció** `echo` imprimeix text a l'arxiu que rep el client (el text va entre cometes dobles).
* Les **instruccions acaben amb punt i coma ";"** (és molt important!)
* L'extensió del fitxer PHP és **.php**.

> El codi PHP és interpretat pel servidor i el client **MAI REBRÀ CODI PHP**.

* El resultat que ha de rebre el client és **TOT HTML**:

```html
<html>
<body>
   <h1>Primer arxiu PHP</h1>
   <p>Hola, Món.</p>
</body>
</html>
```

## Comentaris

Cal distingir els comentaris en HTML dels de PHP.

```php
<html>
   <body>
      <h1>Primer arxiu PHP</h1>
      <!-- Això és un comentari HTML -->
   
      <?php
         // Això és un comentari PHP d'una línia
         echo "<p>Hola, Món</p>";
   
         /* Amb barra i asterisc podem fer
            comentaris PHP de varies línies. */
      ?>
   </body>
</html>
```