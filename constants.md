<!-- notoc -->

# Constants

Similars a les variables però amb la diferència que una vegada ha pres valor ja no pot canviar.

Per definir una **constant** utilitzem la instrucció  `define("NOMCONSTANT",valor)`

```php
<?php
   // Definicions
   define("PI", 3.1416);

   // mostrem per pantalla
   echo "<p>El número Pi és " . PI . "</p>";  
   // enlloc de "PI" es mostrarà "3.1416"
?>
```

Per saber si una constant ha estat definida existeix la funció **defined()**.

```php
<?php
  $definida = defined("PI");
  // Mostrarà 0 si existeix i 1 si no existeix
  echo $definida;
?>
```







