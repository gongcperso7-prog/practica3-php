<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
    if (isset($_POST["nombre"])) {
        $nombre = trim($_POST["nombre"]);
        if (empty($nombre)) {
            echo "<p>El nombre no puede estar vacio</p>";
        } else {
            $linea = $nombre . ";" . trim($_POST["trabajo"]) . ";" . trim($_POST["telefono"]) . ";" . trim($_POST["direccion"]) . ";" . trim($_POST["otras"]) . "\n";
            file_put_contents("agenda.txt", $linea, FILE_APPEND);
            echo "<p>Contacto guardado</p>";
        }
    }

    if (file_exists("agenda.txt")) {
        $contactos = file("agenda.txt");
        foreach ($contactos as $c) {
            $c = trim($c);
            if ($c != "") {
                $datos = explode(";", $c);
                echo "Contacto: $datos[0] $datos[1] $datos[2] $datos[3] $datos[4]<br>";
            }
        }
    } else {
        echo "<p>No hay contactos</p>";
    }
    ?>

    <h2>Agenda Virtual PHP</h2>
    <h1>Contactos</h1>
    <p>Para guardar presione el boton</p>

    <form action="" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Trabajo: <input type="text" name="trabajo"><br>
        Telefono: <input type="text" name="telefono"><br>
        Direccion: <input type="text" name="direccion"><br>
        Otras: <input type="text" name="otras"><br>
        <button type="submit">Guardar!</button>
        <button type="reset">Reset</button>
    </form>

    <h2>Buscar contacto</h2>
    <form action="" method="post">
        Nombre: <input type="text" name="buscado">
        <button type="submit">Buscar</button>
    </form>

    <?php
    if (isset($_POST["buscado"])) {
        $buscado = trim($_POST["buscado"]);
        $total = 0;
        if (!empty($buscado) && file_exists("agenda.txt")) {
            $contactos = file("agenda.txt");
            foreach ($contactos as $c) {
                $c = trim($c);
                if ($c != "") {
                    $datos = explode(";", $c);
                    if (stripos($datos[0], $buscado) !== false) {
                        echo "<p>Nombre: $datos[0]<br>Trabajo: $datos[1]<br>Telefono: $datos[2]<br>Direccion: $datos[3]<br>Otras: $datos[4]</p>";
                        $total++;
                    }
                }
            }
        }
        if ($total == 0) {
            echo "<p>No se ha encontrado ese contacto</p>";
        } else {
            echo "<p>Contactos encontrados: $total</p>";
        }
    }
    ?>
</body>
</html>
