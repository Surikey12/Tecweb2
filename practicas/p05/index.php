<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Manejo de variable en PHP</title>
</head>
<body>
<p>Array</p>
<pre>
(
[0] => $_myvar => valida
[1] => $_7var => valida
[2] => myvar => invalida
[3] =>
[4] => $myvar => valida
[5] => $var7 => valida
[6] => $_element1 => valida
[7] => $house*5 => invalida
)
</pre>
<p>PHP server</p>
<p>Este fragmento de código está utilizando referencias, lo que permite que dos variables apunten a la misma ubicación en memoria, de modo que un cambio en una de ellas afecta a la otra.</p>
<p>PHP5</p>
<pre>
Array
(
[0] => PHP5
)
</pre>
<p>5a versión de PHP</p>
<p>50</p>
<p>5050</p>
<p>25502500</p>
<p>MySQL</p>
<p>9000</p>
<p>Valores booleanos con var_dump():</p>
<p>bool(false)</p>
<p>Mostrar valores booleanos de forma legible:</p>
<p>$c: FALSE</p>
<p>$e: FALSE</p>
<p>Versión de Apache: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.0.30</p>
<p>Versión de PHP: 8.0.30</p>
<p>Nombre del sistema operativo del servidor: Windows NT SURIKEY 10.0 build 22631 (Windows 10) AMD64</p>
<p>Idioma del navegador (cliente): es-MX,es;q=0.9,en-US;q=0.8,en;q=0.7</p>
</body>
</html>