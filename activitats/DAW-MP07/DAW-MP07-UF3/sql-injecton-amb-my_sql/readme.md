# SQL Injection amb my_sql
## DAW-MP07-UF3 - Exercici de Tècniques d’accés a dades.
Un perillòs hacker omple un formulari amb aquestes dades:

![sql injection](https://i.imgur.com/4YsIa3U.png)

EL codi que hi ha darrera del formulari és vulnerable a atacs SQL Injection:

```php
    <?php
      $mysqli = new mysqli("localhost","alumne","*********","sqlinj");

	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}

	/* Query and get the results */
	$user = $_GET["user"] ?? "";
	$pass = $_GET["password"] ?? "";
	$query = "SELECT * FROM access WHERE username='$user' AND password='$pass'";
	$result = $mysqli -> query($query);

	/* Check results */
	$row = $result -> fetch_array(MYSQLI_ASSOC);
	if (!$row){
		die("Error authenticating");
	}
```

## Entregables

En un fitxer PDF:

1. Explica quin és l'objectiu d'aquesta pràctica.
1. Escriu com queda la cadena `$query` amb les dades enviades ( el passwd escrit al formulari eś: 'patata' )
1. Explica que significa `#` en mysql i per què l'utilitza l'atacant.
1. Explica per què aquesta pàgina és vulnerable a SQL Injection.
1. Milloraria la seguretat usar `POST` en comptes de `GET` en aquest escenari? Com? Evitaria l'SQL Injection? Com?
1. Quin tipus de llibreries està usant el codi php? *"Vendor Specific Database Extensions"* o *"Abstraction Layers"*. Influeix això amb la vulnerabilitat SQL Injection? Com?
1. Explica com ho faries per tal que el codi PHP deixi de ser vulnerable a SQL Injection.
1. Un cop llegit el codi php que processa les dades, com ompliries el formulari per a crear el teu propi usuari a la base de dades?
 
## Extra (+2punts) 
1. Prova-ho amb l'adreça facilitada pel professor i canvia la teva nota a la puntuació desitjada






    
    

---

#FpInfor #Daw #DawMp07 #DawMp07Uf03

---

###### Autor: daniel herrera 2015.11.18
###### Editat per: Aniol Lidon 2022.11.10
###### [CC BY](https://creativecommons.org/licenses/by/4.0/) ![CC BY](https://licensebuttons.net/l/by/3.0/80x15.png)
