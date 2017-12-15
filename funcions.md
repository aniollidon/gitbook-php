<!-- notoc -->

#Funcions

> Una **funció** és una agrupació lògica de codi que té un objectiu únic.

La definició d'un funció, comença amb la paraula **function**.

```
function nomFuncio() {
    //codi a executar 
}
```

> **IMPORTANT**: Posar un nom a la funció que ajudi a saber què fa la funció.

[Exemple funció](https://www.w3schools.com/php/showphp.asp?filename=demo_function1)

## Funcions amb paràmetres

Els **paràmetres o arguments** són variables que se li passen a la funció. Els necessita la funció per fer els seus càlculs.

```
function nomFuncio($parametre1, $parametre2) {
    //codi a executar 
}
```
[Exemple funció amb paràmetres](https://www.w3schools.com/php/showphp.asp?filename=demo_function3)

## Funcions amb valors de retorn

```
function nomFuncio() {
    //codi a executar 
    return $valor
}
```

[Exemple funció amb valor de retorn](https://www.w3schools.com/php/showphp.asp?filename=demo_function5)

## Crida a una funció

```php
<?php
    $variable = nomFuncio();
?>
```

Estem cridant a la funció i aquesta ens retorna un valor
També podem cridar funcions que no ens retornen cap valor

