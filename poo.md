# Programació Orientada a Objectes (POO) amb PHP

## Definir una classe

```php
<?php
//Definim la classe Cotxe
class Cotxe {
    //Propietats
    public $color;
    public $potencia;
    public $marca;
    
    //Mètodes
    
}

//Creem un objecte de la classe Cotxe
$elMeuCotxe = new Cotxe();
$elMeuCotxe->color = 'vermell';
$elMeuCotxe->potencia = 120;
$elMeuCotxe->marca = 'audi';

echo 'Color del cotxe: ' . $elMeuCotxe->color; // Mostrarà: "Color del coche: rojo"
?>
```

