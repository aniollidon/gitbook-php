<!-- notoc -->

# Programació Orientada a Objectes (POO)

## Definir una classe

**Cotxe.php**

```php
<?php
//Definim la classe Cotxe
class Cotxe {
    //Constants
    const RODES = 4;
    
    //Propietats
    //private: només permet accedir-hi des de la pròpia classe
    private $color;
    private $potencia;
    private $marca;
    
    //Constructor: s'executa quan es crea l'objecte
    public function __construct($color, $potencia, $marca)
    {
        $this->color = $color;
        $this->potencia;
        $this->marca;
    }
    
    //Mètodes
    public function getColor()
    {
        return $this->color;
    }
    public function getPotencia()
    {
        return $this->potencia;
    }
    public function getMarca()
    {
        return $this->marca;
    }   
}
?>
```

## Crear un objecte

**main.php**
```php
<?php
include 'Cotxe.php';

//Creem un objecte de la classe Cotxe
$elMeuCotxe = new Cotxe('vermell',120,'audi');

echo 'Color del cotxe: ' . $elMeuCotxe->getColor(); // Mostrarà: "Color del coche: vermell"
?>
```

## Operador Doble dos punts :: 

> S'anomena **_doble dos punts "::"_** o **_Paamayim Nekudotayim_** a l'operador que permet accedir a constants i a mètodes estàtics.
> A més, permet poder sobreescriure propietats o mètodes d'una classe. 


```php
<?php
    // Obtenir el valor d'una constant mitjançant el nom de la classe
    echo Cotxe::RODES . "\n";
    
    // Obtenir el valor mitjançant l'objecte
    $elMeuCotxe = new Cotxe();
    echo $elMeuCotxe ::RODES. "\n";
?>
```


## Referències

* Programación orientada a objetos en PHP: [https://diego.com.es/programacion-orientada-a-objetos-en-php](https://diego.com.es/programacion-orientada-a-objetos-en-php)
