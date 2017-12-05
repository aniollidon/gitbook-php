<!-- notoc -->

# Imprimir valors

Tenim dues formes molt semblants de mostrar valors per pantalla `echo` i `print`

La diferència és que `echo` no retorna cap valor i `print` retorna 1.

## echo

Es pot utilitzar sense o amb parèntesis: `echo` o `echo()`.

```php
echo "<h2>PHP is Fun!</h2>";
```

Fixeu-vos que el text pot tenir etiquetes HTML.

```php
<?php
$txt1 = "Learn PHP";
$txt2 = "W3Schools.com";
$x = 5;
$y = 4;

echo "<h2>" . $txt1 . "</h2>";
echo "Study PHP at " . $txt2 . "<br>";
echo $x + $y;
?>
```
[Provar l'exemple](https://www.w3schools.com/php/showphp.asp?filename=demo_echo2)

## print

Es pot utilitzar sense o amb parèntesis: `print` o `print()`.

```php
print "<h2>PHP is Fun!</h2>";
```
