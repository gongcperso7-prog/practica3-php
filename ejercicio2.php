<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
    $dados1 = [];
    $dados2 = [];
    for ($i = 0; $i < 5; $i++) {
        $dados1[] = rand(1, 6);
        $dados2[] = rand(1, 6);
    }

    echo "<h2>Jugador 1</h2>";
    foreach ($dados1 as $d) {
        echo "<img src='img/$d.jpg' width='90'> ";
    }

    echo "<h2>Jugador 2</h2>";
    foreach ($dados2 as $d) {
        echo "<img src='img/$d.jpg' width='90'> ";
    }

    $total1 = array_sum($dados1);
    $total2 = array_sum($dados2);

    echo "<p>Jugador 1: $total1 puntos<br>";
    echo "Jugador 2: $total2 puntos</p>";

    if ($total1 == $total2) {
        echo "<p>En conjunto, han empatado</p>";
    } elseif ($total1 > $total2) {
        echo "<p>En conjunto, ha ganado el jugador 1</p>";
    } else {
        echo "<p>En conjunto, ha ganado el jugador 2</p>";
    }
    ?>
    <a href="ejercicio2.php">Tirar otra vez</a>
</body>
</html>
