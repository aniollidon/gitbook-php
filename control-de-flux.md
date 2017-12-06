# Estructures de control de flux

## IF, ELSE

**if...else**

```
if (condició) {
    //codi a executar si la condició és true;
} else {
   //codi a executar si la condició és false;
}
```

**if...elseif....else**

```
if (condició) {
    //codi a executar si la condició és true;
} elseif (condició) {
    //codi a executar si la condició és true;
} else {
    //codi a executar si la condició és false;
}
```

**Més informació:** w3schools: PHP 5 if...else...elseif Statement [https://www.w3schools.com/php/php_if_else.asp](https://www.w3schools.com/php/php_if_else.asp)

## FOR

S'utilitza quan sabem d'entrada el nombre de vegades que cal repetir el bloc de codi.

```
for (inicialització contador; condició ; increment contador) {
   //codi a executar;
}
```

```php
for  ($i=1; $i<5; $i++) {
  echo "<p>Iteració $i</p>";
}
```

[Exemple For](https://www.w3schools.com/php/showphp.asp?filename=demo_loop_for)

## WHILE

Executa un bloc de codi mentre es compleix la condició.

```
while (condició) {
    //codi a executar;
}
```

[Exemple While](https://www.w3schools.com/php/showphp.asp?filename=demo_loop_while)

## DO ... WHILE

Sempre s'executa el bloc de codi una vegada, es comprova la condició i es repeteix el bloc de codi mentre la condició sigui certa.

```
do {
     //codi a executar;
} while (condició);
```

[Exemple do...while](https://www.w3schools.com/php/showphp.asp?filename=demo_loop_do_while)
## SWITCH

```php
switch ($variable) {
    case valor1:
        //codi a executar si $variable==valor1;
        break;
    case valor2:
        //codi a executar si $variable==valor2;
        break;
    case valor3:
        //codi a executar si $variable==valor3;
        break;
    ...
    default:
        //codi a executar si $variable és diferent
        //a tots els valors;
}
```

[Exemple Switch](https://www.w3schools.com/php/showphp.asp?filename=demo_switch)
 