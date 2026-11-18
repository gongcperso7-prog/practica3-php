<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
</head>
<body>
    <h2>Contenido de datos.txt</h2>
    <?php
    if (file_exists("datos.txt")) {
        $f = fopen("datos.txt", "r");
        while (!feof($f)) {
            $linea = fgets($f);
            if (trim($linea) != "") {
                echo "$linea<br>";
            }
        }
        fclose($f);
    } else {
        echo "Todavia no hay datos guardados";
    }
    ?>
    <br>
    <a href="alumno.html">Volver</a>
</body>
</html>
