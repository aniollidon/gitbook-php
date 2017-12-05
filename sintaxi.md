# Sintaxi

## El primer PHP
El llenguatge php s'insereix en un pàgina HTML.

```php
<html>
<body>
   <h1>Primer arxiu PHP</h1>
   <?php
      echo "<p>Hola, Món</p>";
   ?>
</body>
</html>
```
* Per indicar que incrustem codi PHP cal **obrir amb `<?php`** finalment **tancar amb** `?>`
* La **instrucció** `echo` imprimeix text a l'arxiu que rep el client (el text va entre cometes dobles).
* Les **instruccions acaben amb punt i coma ";"** (és molt important!)


> El client **MAI REP CODI PHP**.

* El resultat que ha de rebre el client és TOT HTML:

```html
<html>
<body>
   <h1>Primer arxiu PHP</h1>
   <p>Hola, Món.</p>
</body>
</html>
```


## Comentaris

Cal distingir els comentaris en HTML dels PHP.
```php
<html>
   <body>
      <h1>Primer arxiu PHP</h1>
      <!-- Això és un comentari HTML -->
   
      <?php
         // Això és un comentari d'una línia
         echo "<p>Hola, Món</p>";
   
         /* Amb barra i asterisc podem fer
            comentaris de varies línies. */
      ?>
   </body>
</html>
```
---