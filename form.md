# Formularis

## Enviar dades amb formularis

Comencem per un **exemple** senzill, un formulari amb dos camp de text:

![](/assets/form.png)

```xml
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

## Obtenir dades enviades

La pàgina destí utilitza un **array associatiu (PHP superglobals)** que són generats automàticament per PHP i que permeten obtenir les dades que ha introduïdes per l'usuari.

Existeixen 3 arrays diferents:

* **Array $_GET**: conté les variables si el formulari ha estat enviat pel mètode GET.
* **Array $_POST**: conté les variables si el formulari ha estat enviat pel mètode POST.
* **Array $_REQUEST**: conté les variables passades per qualsevol dels 2 mètodes (GET o POST).


En aquests arrays associatius, el **name** del camp del formulari serà una **clau** que contidrà el **valor** entrat al formulari.

El fitxer que recollirà la informació `processa.php` pot contenir el següent:

```xml
<html>
  <body>
  <!-- Codi HTML per aquí... -->
  <? php
      $nom = $_REQUEST['nom'];  //Obtenim el nom introduït
      $email = $_REQUEST['email']  
      echo "Hola, $nom!";       //Mostrem una salutació
  ?>
  <!-- Més codi HTML per allà... -->
  </body>
</html>
```
Fixeu-vos que:

* Obtenim el valor entrat al formulari a partir de l'array associatiu `$_REQUEST` i indicant la clau **nom** `$_REQUEST['nom']`.
* En el form anterior hem posat els **noms de les variables NOM i EMAIL (paràmetre "NAME")** i amb aquest mateix nom les hem capturat.
* També podríem haver utilitzat `$_POST['nom']` perquè el formulari s'han enviat utilitzant el mètode post.

## POST i GET

Quan un formulari envia dades ho pot fer mitjançant **dos mètodes** diferents:

### GET

Característiques del mètode **GET**:

* Els **valors** introduits al formulari aperèixen a l'adreça URL i són **visibles per tothom**.
  * No utilitzar per enviar dades sensibles (com passwords). 
  *  Per exemple: `http://localhost/processa.php/nom=jaume&email=jaume@example.com` 
  * [w3schools: Prova un exemple](https://www.w3schools.com/html/tryit.asp?filename=tryhtml_form_get)

* Les dades s'afegeixen a la capçalera de la petició HTTP.
* Té limitació en la quantitat de dades a enviar.
  * Màxim 2000 caràcters. 
* Les sol·licitud GET es guarden en l'historial del navegador.
* Les sol·licitud GET  poden ser *bookmarked*.


### POST

Característiques del mètode **POST**:

* Els **valors** introduits al formulari es transmeten de manera **oculta** (no aparèixen a la barra d'adreces del navegador).
* Les dades s'afegeixen en el cos de la petició HTTP.
* No hi ha límits en la quantitat d'informació a enviar.
* Les dades s'afegeixen en el cos de la petició HTTP.
* Les sol·licitud POST NO es guarden en l'historial del navegador.
* Les sol·licitud POST NO poden ser *bookmarked*.

> En general, els desenvolupadors prefereixen **POST** per enviar dades de formularis.

## Exemple

En aquest exemple veurem com es pot mostrar el formulari i processar les dades del formulari en **una mateixa pàgina php**.

```php

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
   //Processar les dades
} else {
   //Mostrem el formulari
?>
  <form action="processa.php" method="post">
     Nom:<input type="text" name="nom"><br>
     Email: <input type="text" name="email"><br>
     <input type="submit" value="Enviar">
  </form>
<?php
}
?>

```

Fixeu-vos que:

* La condició `$_SERVER['REQUEST_METHOD'] == 'POST'` ens permet saber si ja s'han introduit dades al formulari i per tant cal processar-les.

## Referències

*  **PHP Forms** ([https://cacauet.org/wiki/index.php/PHP_Forms](https://cacauet.org/wiki/index.php/PHP_Forms))

* **Developer.mozilla.org**: Sending form data
[https://developer.mozilla.org/es/docs/Learn/HTML/Forms/Sending_and_retrieving_form_data](https://developer.mozilla.org/es/docs/Learn/HTML/Forms/Sending_and_retrieving_form_data)

---