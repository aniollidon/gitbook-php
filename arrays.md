# Arrays

* Els **arrays** són colleccions ordenades d’elements.
* Cada element té un **valor** i és identificat per una **clau** que és única a l’array.


## Declaració d'un Array

```php
//Declaració amb constructor
$colors=array("verd","groc","vermell");
$colors=array(1=>"verd", 2=>groc, 3=>"vermell");

//Declaració explícita
$color[1]="verd";
$color[2]="groc";
$color[]="vermell";	//Si no posem índex,
			//s'assigna a la següent posició.
```

## Tipus de dades en un array

* A les caselles dels arrays podem guardar dades de qualsevol tipus.
* Els array en PHP podem guardar diferents tipus de dades en les caselles d'un mateix array.
	*  S’anomenen **arrays heterogenis**.
```php
a[0] = 1;
a[1] = "Hola";
a[2] = 0.75;
a[3] = true;

//Declaració resumida del array
$a = array(1, "Hola", 0.75, true);
```

## Array associatius

* També s'anomenen diccionaris o mapes.
* Són un conjunt d'elements **clau** - **valor**

```php
$a = array("id"=>1,"name"=>"Sayeed","age"=>24);
```

![php](http://programmingsphere.com/wp-content/uploads/2015/07/associative-array-in-PHP.jpg) 

**Nota**: Per mostrar els valors d'un array associatiu es pot utilitzar la funció `print_r($a)`

## Funcions amb Arrays

`$a=array(‘Nom1’=>'Maria’,'Nom2’=>’Joan’,…);`

* **count($a)**: ens diu quants elements té l’array
* **array_key_exists('clau', $a)**: ens diu si existeix la clau en l'array.

```php
array_key_exists('Nom1', $a);	//retorna true
```
* **in_array(‘valor', $a)**: ens diu si existeix el valor en l'array.
```php
in_array('Maria', $a);	//retorna true
```

## Funcions amb Arrays

* **unset($a[‘clau’])**: ens elimina l'element que té la clau indicada
* **sort($a)**: ordena els valors de menor a majors.
* **rsort($a)**: ordena els valors de major a menor.
* **array_push($a,'valor1','valor2')**: afegeix un valor o més al final d'un array.

```php
array_push($a,'Dani', 'Raquel');
```
* **array_pop($a')**: elimina l'últim element de l'array i retorna el seu valor.

```php
$valor = array_pop($a);
```

## Arrays multidimensionals

* En **PHP**, els tots arrays són de una única dimensió.
	* Podem crear arrays multidimesionals creant arrays d’arrays, com si els elements de l'array fossin al seu torn altres arrays. 


### Declaració Arrays multidimensionals

* Podem declarar arrays de **qualsevol dimensió**. 

```php
//DECLARACIÓ ARRAY DUES DIMENSIONS
$ciutat1 = [20, 22, 18];
$ciutat2 = [25, 29, 23];
$ciutat3 = [15, 19, 15];
//guardem els array en un altre array
$temperatures = [$ciutat1,$ciutat2,$ciutat3];

//DECLARACIÓ ABREUJADA
$temperatures = array(array(20, 22, 18),array(25, 29, 23),array(15, 19, 15));
```

```php
//Accés a les dades
$temperatures[0][2]			//Retorna 18
$temperatures[2][1]			//Retorna 19
```

>



