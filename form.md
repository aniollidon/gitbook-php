<!-- notoc -->

# Formularis

**Exemple:**

```html
<html>
<body>
  <form action="processa.php" method="post">
     Nom:<input type="text" name="nom"><br>
     Email: <input type="text" name="email"><br>
     <input type="submit" value="Enviar">
  </form>
</body>
</html>
```
Fixeu-vos que:

* El tag `<form>`  envolta tots els camps del **formulari**.
  * **method**: indica la forma d'enviament de la informació (POST o GET).
  * **action**: indica el fitxer on s'enviaran les dades
  
  
*  Dintre trobem **diversos camps** `<input>`, tants com camps de dades (nom i email) vulguem posar.
  * **name**: És molt important el atribut `name` que s'ha de posar a cada camp del formulari. Indica el nom que l'identifica i que ens permetrà recuperar el valor introduït.
  * **submit**: El darrer `<input>` és de tipus **_submit_** 
    * És el botó per enviar les dades quan les haguem introduït. 
    * Si no el posem no podrem enviar les dades al servidor.
    *  El atribut `value` és el text que mostrarà el botó. 

## Processament

*  La pàgina destí pot utilitzar un **array associatiu (PHP superglobals) ** (`$_REQUEST, $_POST o $_GET`) del qual el **name** del camp serà una **clau** que contidrà el **valor** entrat al formulari.

* El fitxer que recollirà la informació `processa.php` pot contenir el següent:

```php
<html>
  <body>
  <!-- Codi HTML per aquí... -->
  <? php
      $nom = $_REQUEST['nom'];  //Obtenim el nom introduït
      echo "Hola, $nom!";       //Mostrem una salutació
  ?>
  <!-- Més codi HTML per allà... -->
  </body>
</html>
```
* Obtenim el valor entrat al formulari a partir de l'array associatiu `$_REQUEST` i indicant la clau **nom** `$_REQUEST['nom'].
* També podríem haver utilitzat `$_POST['nom']` perquè el formulari s'han enviat utilitzant el mètode post.

## POST i GET

Quan un formulari envia dades ho pot fer mitjançant dos mètodes diferents:

  * **POST**:  els valors del formulari es transmeten de manera oculta (no aparèixen a la barra d'adreces del navegador).
  * **GET**: els valors aperèixen a l'adreça URL i són visibles per tothom.
  
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

> En general, els desenvolupadors prefereixen POST per enviar dades de formularis.

## Documentació i recursos

*  **PHP Forms** ([https://cacauet.org/wiki/index.php/PHP_Forms](https://cacauet.org/wiki/index.php/PHP_Forms))

---