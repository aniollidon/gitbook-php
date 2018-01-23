<!-- notoc -->

# Formularis

```html
<html>
<body>
<form action="processa.php" method="post">
    <label for="name">Nom:</label><input type="text" name="nom"><br>
    <input type="submit" value="Enviar">
</form>
</body>
</html>
```

* **method**: indica la forma d'enviament de la informació (POST o GET).
* **action**: indica el fitxer on s'enviaran les dades
* **name**: per cada camp del formulari indica el nom que l'identifica i que ens permetrà recuperar el valor introduït. 

## Processament

*  La pàgina destí pot utilitzar un **array associatiu (PHP superglobals) ** (`$_REQUEST, $_POST o $_GET`) del qual el **name** del camp serà una **clau** que contidrà el **valor** entrat al formulari.

* El fitxer que recollirà la informació `processa.php` pot contenir el següent:
```php
<? php
    $nom = $_REQUEST['nom'];  //Obtenim el nom introduït
    echo "Hola, $nom!";       //Mostrem una salutació
?>
```
* Obtenim el valor entrat al formulari a partir de l'array associatiu `$_REQUEST` i indicant la clau **nom**.

## POST i GET

Quan un formulari envia dades ho pot fer mitjançant dos mètodes diferents:

  * **POST**:  els valors del formulari es transmeten de manera oculta (no aparèixen a la barra d'adreces del navegador).
  * **GET**:	els valors aperèixen a l'adreça URL.
  
  Per exemple: 
  `http://localhost/processa.php/nom=jaume&curs=1` 

### GET

Característiques del mètode **GET**:

* Les dades són visibles en la URL.
  * No utilitzar per enviar dades sensibles (com passwords).
* Té limitació en la quantitat de dades a enviar.
  * Màxim 2000 caràcters. 
* Les sol·licitud GET es guarden en l'historial del navegador.
* Les sol·licitud GET  poden ser *bookmarked*.

### POST

Característiques del mètode **POST**:
* No hi ha límits en la quantitat d'informació a enviar.
* Les dades s'afegeixen en el cos de la petició HTTP.
* Les sol·licitud POST NO es guarden en l'historial del navegador.
* Les sol·licitud POST NO poden ser *bookmarked*.

---