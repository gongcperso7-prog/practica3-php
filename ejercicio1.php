<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
</head>
<body>
    <h2>Rectangulo de estrellas</h2>
    <p>Escriba el alto y el ancho (numeros entre 1 y 100)</p>

    <form action="" method="post">
        Ancho: <input type="number" name="ancho"><br><br>
        Alto: <input type="number" name="alto"><br><br>
        <button type="submit">Dibujar</button>
        <button type="reset">Borrar</button>
    </form>

    <?php
    if (isset($_POST["ancho"])) {
        $ancho = trim($_POST["ancho"]);
        $alto = trim($_POST["alto"]);

        if (!is_numeric($ancho) || !is_numeric($alto)) {
            echo "<p>Tienes que escribir numeros</p>";
        } elseif ($ancho < 1 || $ancho > 100 || $alto < 1 || $alto > 100) {
            echo "<p>Los numeros tienen que estar entre 1 y 100</p>";
        } else {
            echo "<p>Alto: $alto - Ancho: $ancho</p>";
            $fila = 1;
            while ($fila <= $alto) {
                for ($col = 1; $col <= $ancho; $col++) {
                    echo "* ";
                }
                echo "<br>";
                $fila++;
            }
        }
    }
    ?>
</body>
</html>
