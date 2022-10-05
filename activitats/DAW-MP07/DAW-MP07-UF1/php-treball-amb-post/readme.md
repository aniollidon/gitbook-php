# PHP - Treball amb POST
## DAW-MP07-UF1 - Exercici de Desenvolupament web en entorn servidor.
En aquest exercici modificarem el comportament del programa de l'exercici [php-treball-senzill-amb-formularis](/activitats/DAW-MP07/DAW-MP07-UF1/php-treball-senzill-amb-formularis/readme.md). Es tracta d'unificar les dues pàgines: **pinta_formulari.php** i **processa_dades.php** en una única pàgina **formulari.php**. 

Desenvolupament de l'exercici:

La pàgina **formulari.php** detectarà si li estan fent un POST, si és el cas processarà les dades que li arriben. Si no és el cas, no és un POST, llavors, simplement, mostrarà el formulari:

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
       //Processar les dades
    } else {
       //Pintar el formulari
    }
    
    
Solució

```php
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formularis</title>
</head>

<body>
    <div style="margin: 30px 10%;">
    
    <?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Processar les dades
        echo "<h3>Dades processades </h3>";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    } else {
        //Pintar el formulari
        
    ?>

    <h3>My form</h3>
    <form action="22-Formularis_treball_amb_POST.php" method="post" id="myform" name="myform">

        <label>Text</label> <input type="text" value="" size="30" maxlength="100" name="mytext" id="" /><br /><br />
    
        <input type="radio" name="myradio" value="1" /> First radio
        <input type="radio" checked="checked" name="myradio" value="2" /> Second radio<br /><br />
    
        <input type="checkbox" name="mycheckbox[]" value="1" /> First checkbox
        <input type="checkbox" checked="checked" name="mycheckbox[]" value="2" /> Second checkbox<br /><br />
    
        <label>Select ... </label>
        <select name="myselect" id="">
            <optgroup label="group 1">
                <option value="1" selected="selected">item one</option>
            </optgroup>
            <optgroup label="group 2" >
                <option value="2">item two</option>
            </optgroup>
        </select><br /><br />
    
        <textarea name="mytextarea" id="" rows="3" cols="30">
            Text area
        </textarea> <br /><br />
    
        <button id="mysubmit" type="submit">Submit</button><br /><br />

    </form>
    
    <?php
    
    }

    ?>
    
</div>
           
</body>
</html>

```




---

#FpInfor #Daw #DawMp07 #DawMp07Uf01

* Resultats d'aprenentatge 3.f
* Continguts 3.6
---

###### Autor: daniel herrera 2013.09.30 13:28:17
###### Editat per: daniel herrera 2013.10.29 13:32:26
###### [CC BY](https://creativecommons.org/licenses/by/4.0/) ![CC BY](https://licensebuttons.net/l/by/3.0/80x15.png)
