<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3</title>
</head>
<body>
    <?php
    $nombre = trim($_POST["nombre"]);
    $telefono = trim($_POST["telefono"]);
    $mostrar = $_POST["mostrar"];

    $errores = [];
    if (empty($nombre)) {
        $errores[] = "Falta el nombre";
    }
    if (!is_numeric($telefono)) {
        $errores[] = "El telefono tiene que ser un numero";
    }

    if (count($errores) > 0) {
        foreach ($errores as $error) {
            echo "- $error<br>";
        }
    } else {
        if (isset($_POST["matriculado"]) && isset($_POST["ensenanza"])) {
            $frase = "El alumno $nombre, con telefono $telefono, esta matriculado en " . $_POST["ensenanza"];
        } elseif (isset($_POST["matriculado"])) {
            $frase = "El alumno $nombre, con telefono $telefono, esta matriculado";
        } else {
            $frase = "El alumno $nombre, con telefono $telefono, no esta matriculado";
        }

        if ($mostrar == "pantalla") {
            echo "<p align='center'><b>$frase</b></p>";
        } else {
            file_put_contents("datos.txt", $frase . "\n", FILE_APPEND);
            echo "Datos guardados en datos.txt<br><br>";
            echo "<a href='mostrardatos.php'>mostrar archivo</a>";
        }
    }
    ?>
    <br><br>
    <a href="alumno.html">Volver</a>
</body>
</html>
