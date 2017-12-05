# Estructures de control de flux

## IF, ELSE

```php
if (condició) {
    //codi a executar si la condició és true;
} else {
   //codi a executar si la condició és false;
}
```
```php
if (condició) {
    //codi a executar si la condició és true;
} elseif (condició) {
    //codi a executar si la condició és true;
} else {
    //codi a executar si la condició és false;
}
```

## FOR

```
for (inicialització contador; condició de final ; increment contador) {
   //codi a executar;
}
```

```php
for  ($i=1; $i<5; $i++) {
  echo "<p>Iteració $i</p>";
}
```

## WHILE

```
while (condició) {
    //codi a executar;
}
```

## DO ... WHILE

```
do {
     //codi a executar;
} while (condició);
```

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