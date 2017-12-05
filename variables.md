# Variables

* En PHP les variables comencen amb el símbol de **$** seguit pel nom de la variable.

* PHP distingeix entre majúscules i minúscules (case-sensitive). Les variables `$persona` i `$Persona` són diferents.

* **No cal declarar les variables.**
* **No cal definir el seu tipus.**

* PHP converteix automàticament la variable al tipus correcte depenet del valor assignat.

```php
  <?php
  $nom="Sergi";      //Variable de tipus String
  $edat=35;          //Variable de tipus Integer
  $pes=61.5;         //Variable de tipus Float
  $casat=true;       //Variable de tipus Boolean
  ?>
```

Les variables poden **canviar de tipus**:

```php
$nomPersona = "Àlex";
$edat = "35";
//La variable edat és de tipus string

echo "$nomPersona té $edat anys<br>";

$edat = 34;
//Ara la variable edat és de tipus integer:

$edat++;
echo "$nomPersona té $edat anys";
```

## Funcions pels tipus de variables

* **gettype(variable)**: torna el tipus de dada de la variable.
* **settype(variable,tipus)**: converteix la variable al tipus indicat.
* **isset(variable)**: indica si la variable s'ha inicialitzat.
```php
$a = "10";
echo gettype($a); 	//Mostrarà String
settype($a,"integer");  //Convertim el string a number
echo gettype ($a);	//Mostrarà integer
settype($a,"number");	//Convertim el string a number
echo isset($b);		//Mostrarà false perquè la
			//variable no s'ha inicialitzat        
```
---

